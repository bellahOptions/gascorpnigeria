<?php

use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

/**
 * Compact "request a callback" panel used in the contact rail. Stores the
 * enquiry as a contact message so nothing is lost, and flags it clearly as a
 * callback request in the subject line.
 */
new class extends Component
{
    public string $name = '';

    public string $phone = '';

    public string $topic = '';

    public bool $done = false;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:120'],
            'phone' => ['required', 'string', 'min:7', 'max:20', 'regex:/^\+?[0-9\-\s()]+$/'],
            'topic' => ['required', 'string', 'min:3', 'max:120'],
        ];
    }

    protected function messages(): array
    {
        return [
            'phone.regex' => 'Please enter a valid phone number.',
        ];
    }

    public function updated(string $property): void
    {
        if (in_array($property, ['name', 'phone', 'topic'], true)) {
            $this->validateOnly($property);
        }
    }

    public function submit(): void
    {
        $ipKey = 'callback:'.request()->ip();

        if (RateLimiter::tooManyAttempts($ipKey, 5)) {
            $this->addError('rate_limit', 'Too many requests. Please try again later.');

            return;
        }

        $this->validate();
        RateLimiter::hit($ipKey, 600);

        try {
            ContactMessage::create([
                'name' => $this->name,
                'email' => 'callback-request@gascorpnigeria.com',
                'phone' => $this->phone,
                'subject' => '[Callback request] '.$this->topic,
                'message' => "Callback requested.\n\nName: {$this->name}\nPhone: {$this->phone}\nTopic: {$this->topic}\nSubmitted from: ".url()->current(),
                'ip_address' => request()->ip(),
                'user_agent' => substr((string) request()->userAgent(), 0, 255),
            ]);
        } catch (\Throwable $exception) {
            Log::error('Callback request could not be stored.', ['error' => $exception->getMessage()]);
            $this->addError('rate_limit', 'Something went wrong. Please call us on +234 703 839 2520.');

            return;
        }

        $this->reset(['name', 'phone', 'topic']);
        $this->resetValidation();
        $this->done = true;
    }

    public function resetForm(): void
    {
        $this->done = false;
    }
};
?>

<div class="border border-white/12 bg-white/[0.04] p-6">
    <p class="label text-[#F59E0B]">Prefer to talk?</p>
    <h3 class="heading heading-sm mt-3 text-white">Request a callback</h3>

    @if ($done)
        <div class="mt-5" role="status">
            <p class="text-sm leading-6 text-white/80">
                Thank you — we have your number and will call you back on the next working day.
            </p>
            <button type="button" class="btn btn-outline-light btn-sm mt-4" wire:click="resetForm">
                Request another callback
            </button>
        </div>
    @else
        <p class="mt-3 text-sm leading-6 text-white/65">
            Leave your number and the topic you want covered. We will call you back within one working day.
        </p>

        <form wire:submit="submit" class="mt-5 space-y-4" novalidate>
            <div>
                <label for="cb-name" class="field-label text-white/80">Name <span class="text-[#F59E0B]">*</span></label>
                <input id="cb-name" type="text" wire:model.blur="name" maxlength="120" placeholder="Your name"
                    class="field border-white/20 bg-white/5 text-white placeholder:text-white/40 focus:border-[#F59E0B] focus:shadow-[0_0_0_3px_rgba(245,158,11,0.18)]"
                    aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}">
                @error('name')
                    <span class="mt-1.5 block text-xs font-semibold text-[#fbbf24]">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="cb-phone" class="field-label text-white/80">Phone <span class="text-[#F59E0B]">*</span></label>
                <input id="cb-phone" type="tel" wire:model.blur="phone" maxlength="20" placeholder="+234 803 000 0000"
                    class="field border-white/20 bg-white/5 text-white placeholder:text-white/40 focus:border-[#F59E0B] focus:shadow-[0_0_0_3px_rgba(245,158,11,0.18)]"
                    aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}">
                @error('phone')
                    <span class="mt-1.5 block text-xs font-semibold text-[#fbbf24]">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="cb-topic" class="field-label text-white/80">What is it about? <span class="text-[#F59E0B]">*</span></label>
                <input id="cb-topic" type="text" wire:model.blur="topic" maxlength="120" placeholder="e.g. CNG station rollout"
                    class="field border-white/20 bg-white/5 text-white placeholder:text-white/40 focus:border-[#F59E0B] focus:shadow-[0_0_0_3px_rgba(245,158,11,0.18)]"
                    aria-invalid="{{ $errors->has('topic') ? 'true' : 'false' }}">
                @error('topic')
                    <span class="mt-1.5 block text-xs font-semibold text-[#fbbf24]">{{ $message }}</span>
                @enderror
            </div>

            @error('rate_limit')
                <p class="text-xs font-semibold text-[#fbbf24]">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-gold btn-block" wire:loading.attr="disabled" wire:target="submit">
                <span wire:loading.remove wire:target="submit">Request callback</span>
                <span wire:loading wire:target="submit">Sending…</span>
            </button>
        </form>
    @endif
</div>
