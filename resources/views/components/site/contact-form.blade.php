<?php

use App\Mail\ContactSubmissionConfirmation;
use App\Mail\ContactSubmissionNotification;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * Contact enquiry form.
 *
 * Validation, spam screening (honeypot + submission timing + Cloudflare
 * Turnstile) and persistence all run inside Livewire so the visitor gets
 * inline field-level feedback without a page reload. The queued mailables and
 * database writes mirror the legacy ContactController exactly.
 */
new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $subject = '';

    public string $message = '';

    /** Honeypot — must stay empty. */
    public string $website = '';

    public bool $submitted = false;

    public bool $turnstileEnabled = false;

    public string $turnstileToken = '';

    public int $formStartedAt = 0;

    public function mount(): void
    {
        $this->formStartedAt = now()->timestamp;
        $this->turnstileEnabled = filled(config('services.turnstile.site_key'))
            && filled(config('services.turnstile.secret_key'));

        // Repopulate after a non-Livewire fallback submission.
        if (session()->has('contact_old')) {
            $old = (array) session()->pull('contact_old');
            $this->name = (string) ($old['name'] ?? '');
            $this->email = (string) ($old['email'] ?? '');
            $this->phone = (string) ($old['phone'] ?? '');
            $this->subject = (string) ($old['subject'] ?? '');
            $this->message = (string) ($old['message'] ?? '');
        }
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:120', 'regex:/^[\p{L}\s.\-]+$/u'],
            'email' => ['required', 'email:rfc,dns', 'max:150'],
            'phone' => ['required', 'string', 'min:7', 'max:20', 'regex:/^\+?[0-9\-\s()]+$/'],
            'subject' => ['required', 'string', 'min:5', 'max:150'],
            'message' => ['required', 'string', 'min:20', 'max:3000'],
            'website' => ['nullable', 'max:0'],
        ];
    }

    protected function messages(): array
    {
        return [
            'website.max' => 'Spam detected.',
            'name.regex' => 'Name may only contain letters, spaces, hyphens, and dots.',
            'phone.regex' => 'Please enter a valid phone number.',
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'name' => 'full name',
            'email' => 'email address',
            'phone' => 'phone number',
            'subject' => 'subject',
            'message' => 'message',
        ];
    }

    /** Live inline validation so a field turns green/red as the user leaves it. */
    public function updated(string $property): void
    {
        if (in_array($property, ['name', 'email', 'phone', 'subject', 'message'], true)) {
            $this->validateOnly($property);
        }
    }

    public function submit(): void
    {
        // Honeypot first — silently absorb bots without spending rate-limit budget.
        if (filled($this->website)) {
            $this->submitted = true;

            return;
        }

        $this->validate();

        $ipKey = 'contact-form:'.request()->ip();

        if (RateLimiter::tooManyAttempts($ipKey, 5)) {
            $seconds = RateLimiter::availableIn($ipKey);
            $this->addError('rate_limit', "Too many attempts. Please try again in {$seconds} seconds.");

            return;
        }

        $elapsed = time() - $this->formStartedAt;

        if ($elapsed < 4 || $elapsed > 3600) {
            $this->addError('form_started_at', 'This form session expired. Please refresh the page and try again.');
            $this->formStartedAt = now()->timestamp;

            return;
        }

        if ($this->turnstileEnabled && ! $this->verifyTurnstile()) {
            $this->addError('captcha', 'Security verification failed. Please try again.');

            return;
        }

        RateLimiter::hit($ipKey, 600);

        $contactMessage = ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'ip_address' => request()->ip(),
            'user_agent' => substr((string) request()->userAgent(), 0, 255),
        ]);

        $internalRecipients = [
            'okey.ndukwe@gascorpnigeria.com',
            'elder.o.ndukwe@gmail.com',
            'info@gascorpnigeria.com',
            'muyiwadavis65@gmail.com',
        ];

        try {
            Mail::to($internalRecipients)->queue(new ContactSubmissionNotification($contactMessage));
            Mail::to($contactMessage->email)->queue(new ContactSubmissionConfirmation($contactMessage));
        } catch (\Throwable $exception) {
            Log::error('Contact form email dispatch failed.', [
                'contact_message_id' => $contactMessage->id,
                'error' => $exception->getMessage(),
            ]);
        }

        $this->reset(['name', 'email', 'phone', 'subject', 'message', 'website', 'turnstileToken']);
        $this->resetValidation();
        $this->formStartedAt = now()->timestamp;
        $this->submitted = true;

        $this->dispatch('contact-submitted');
    }

    protected function verifyTurnstile(): bool
    {
        try {
            $result = Http::asForm()
                ->timeout(8)
                ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => config('services.turnstile.secret_key'),
                    'response' => $this->turnstileToken,
                    'remoteip' => request()->ip(),
                ])
                ->json();
        } catch (\Throwable $exception) {
            Log::warning('Turnstile verification request failed.', ['error' => $exception->getMessage()]);

            return false;
        }

        return (bool) ($result['success'] ?? false);
    }

    public function sendAnother(): void
    {
        $this->submitted = false;
        $this->resetValidation();
    }
};
?>

<div class="card p-6 md:p-9" id="contact-form">
    @if ($submitted)
        <div class="py-6 text-center md:py-10" role="status">
            <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#0D9488]/10 text-[#0D9488]">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7" />
                </svg>
            </span>
            <h2 class="heading heading-md mt-6">Message received</h2>
            <p class="lede mx-auto mt-3 max-w-lg">
                Thank you. Your enquiry has been logged and routed to the relevant commercial or operations lead.
                A member of the GASCORP team will respond shortly.
            </p>
            <button type="button" class="btn btn-outline mt-7" wire:click="sendAnother">
                Send another enquiry
            </button>
        </div>
    @else
        <div class="max-w-2xl">
            <p class="eyebrow">Send a message</p>
            <h2 class="heading heading-md mt-4">Tell us what you are building.</h2>
            <p class="lede mt-3 text-base">
                Include your location, volume requirement, timeline and the type of support you need so we can route
                your enquiry to the right team on the first pass.
            </p>
        </div>

        @if ($errors->has('rate_limit'))
            <div class="alert alert-error mt-6" role="alert">{{ $errors->first('rate_limit') }}</div>
        @endif

        <form wire:submit="submit" class="mt-8 space-y-6" novalidate>
            {{-- Honeypot --}}
            <div class="absolute left-[-9999px] h-0 w-0 overflow-hidden" aria-hidden="true">
                <label for="website">Website</label>
                <input id="website" type="text" wire:model="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div>
                    <label for="name" class="field-label">Full name <span class="text-[#b91c1c]">*</span></label>
                    <input
                        id="name"
                        type="text"
                        wire:model.blur="name"
                        maxlength="120"
                        autocomplete="name"
                        placeholder="Jane Doe"
                        @class(['field'])
                        aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                        @error('name') aria-describedby="name-error" @enderror
                    >
                    @error('name')
                        <span class="field-error" id="name-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="field-label">Email address <span class="text-[#b91c1c]">*</span></label>
                    <input
                        id="email"
                        type="email"
                        wire:model.blur="email"
                        maxlength="150"
                        autocomplete="email"
                        placeholder="jane@company.com"
                        @class(['field'])
                        aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                        @error('email') aria-describedby="email-error" @enderror
                    >
                    @error('email')
                        <span class="field-error" id="email-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div>
                    <label for="phone" class="field-label">Phone number <span class="text-[#b91c1c]">*</span></label>
                    <input
                        id="phone"
                        type="tel"
                        wire:model.blur="phone"
                        maxlength="20"
                        autocomplete="tel"
                        placeholder="+234 803 000 0000"
                        @class(['field'])
                        aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}"
                        @error('phone') aria-describedby="phone-error" @enderror
                    >
                    @error('phone')
                        <span class="field-error" id="phone-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="subject" class="field-label">Subject <span class="text-[#b91c1c]">*</span></label>
                    <input
                        id="subject"
                        type="text"
                        wire:model.blur="subject"
                        maxlength="150"
                        placeholder="Gas logistics partnership"
                        @class(['field'])
                        aria-invalid="{{ $errors->has('subject') ? 'true' : 'false' }}"
                        @error('subject') aria-describedby="subject-error" @enderror
                    >
                    @error('subject')
                        <span class="field-error" id="subject-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="message" class="field-label">Message <span class="text-[#b91c1c]">*</span></label>
                <textarea
                    id="message"
                    rows="7"
                    wire:model="message"
                    x-on:input="count = $event.target.value.length"
                    maxlength="3000"
                    placeholder="Share your location, volume needs, timeline, and the type of support required."
                    @class(['field', 'resize-y'])
                    aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}"
                    aria-describedby="message-hint"
                ></textarea>
                <div class="flex items-start justify-between gap-4" x-data="{ count: {{ strlen($message) }} }">
                    @error('message')
                        <span class="field-error">{{ $message }}</span>
                    @else
                        <span class="field-hint" id="message-hint">Minimum 20 characters.</span>
                    @enderror
                    <span class="field-hint mono-num ml-auto shrink-0" x-text="count + '/3000'"></span>
                </div>
            </div>

            @if ($turnstileEnabled)
                <div>
                    <span class="field-label">Security check <span class="text-[#b91c1c]">*</span></span>
                    <div
                        class="mt-1 border border-[#e6e9ee] bg-[#F9FAFB] p-4"
                        wire:ignore
                        x-data="{
                            init() {
                                const render = () => {
                                    if (! window.turnstile) { setTimeout(render, 250); return; }
                                    window.turnstile.render($el.querySelector('.cf-turnstile'), {
                                        sitekey: '{{ config('services.turnstile.site_key') }}',
                                        theme: 'light',
                                        callback: (token) => $wire.set('turnstileToken', token),
                                        'expired-callback': () => $wire.set('turnstileToken', ''),
                                        'error-callback': () => $wire.set('turnstileToken', ''),
                                    });
                                };
                                render();
                            }
                        }"
                    >
                        <div class="cf-turnstile"></div>
                    </div>
                    @error('captcha')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
            @endif

            @error('form_started_at')
                <div class="alert alert-error" role="alert">{{ $message }}</div>
            @enderror

            <div class="flex flex-col gap-4 border-t border-[#e6e9ee] pt-6 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-sm leading-6 text-[#475069]">
                    Fields marked with an asterisk are required. We reply within two business days.
                </p>
                <button
                    type="submit"
                    class="btn btn-primary"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                >
                    <span wire:loading.remove wire:target="submit">Submit enquiry</span>
                    <span class="inline-flex items-center gap-2" wire:loading wire:target="submit">
                        <span class="spinner" aria-hidden="true"></span>
                        Sending
                    </span>
                    <svg class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" wire:loading.remove wire:target="submit">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </button>
            </div>
        </form>
    @endif

    @if ($turnstileEnabled && ! $submitted)
        @assets
            <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit" async defer></script>
        @endassets
    @endif
</div>
