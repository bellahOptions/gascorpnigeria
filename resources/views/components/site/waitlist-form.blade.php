<?php

use App\Mail\WaitlistSignupConfirmation;
use App\Models\WaitlistSignup;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

/**
 * GASCORP App pre-launch waitlist. Keeps the same rate limiting, firstOrCreate
 * de-duplication and queued confirmation email as the legacy controller, but
 * resolves inline inside Livewire so the visitor never leaves the page.
 */
new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $role = '';

    public ?string $status = null;

    public string $statusTone = 'success';

    public string $source = 'app-landing';

    public function mount(?string $source = 'app-landing'): void
    {
        $this->source = $source ?: 'app-landing';

        if (session()->has('waitlist_success')) {
            $this->status = (string) session()->pull('waitlist_success');
            $this->statusTone = 'success';
        }
    }

    protected function rules(): array
    {
        $emailRule = app()->runningUnitTests() ? 'email:rfc' : 'email:rfc,dns';

        return [
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'email' => ['required', $emailRule, 'max:150'],
            'role' => ['required', 'in:customer,driver,investor,admin'],
        ];
    }

    protected function messages(): array
    {
        return [
            'role.in' => 'Please select a valid role.',
        ];
    }

    public function updated(string $property): void
    {
        if (in_array($property, ['name', 'email', 'role'], true)) {
            $this->validateOnly($property);
        }
    }

    public function submit(): void
    {
        $ipKey = 'waitlist:'.request()->ip();

        if (RateLimiter::tooManyAttempts($ipKey, 8)) {
            $seconds = RateLimiter::availableIn($ipKey);
            $this->statusTone = 'error';
            $this->status = "Too many submissions. Please try again in {$seconds} seconds.";

            return;
        }

        $this->validate();

        RateLimiter::hit($ipKey, 600);

        $signup = WaitlistSignup::firstOrCreate(
            ['email' => $this->email],
            [
                'name' => $this->name,
                'role' => $this->role,
                'source' => $this->source,
                'ip_address' => request()->ip(),
                'user_agent' => substr((string) request()->userAgent(), 0, 255),
            ]
        );

        if (! $signup->wasRecentlyCreated) {
            $this->statusTone = 'success';
            $this->status = 'This email is already on the waitlist. We will keep you updated.';
            $this->reset(['name', 'email', 'role']);

            return;
        }

        try {
            Mail::to($signup->email)->queue(new WaitlistSignupConfirmation($signup));
        } catch (\Throwable $exception) {
            Log::error('Waitlist confirmation email dispatch failed.', [
                'waitlist_signup_id' => $signup->id,
                'error' => $exception->getMessage(),
            ]);
        }

        $this->statusTone = 'success';
        $this->status = 'You are on the waitlist. We will notify you as launch gets closer.';
        $this->reset(['name', 'email', 'role']);
        $this->dispatch('waitlist-joined', source: $this->source);
    }
};
?>

<div>
    @if ($status)
        <p
            @class([
                'mb-5 border px-4 py-3 text-sm font-semibold',
                'border-teal-200 bg-teal-50 text-[#0a6f66]' => $statusTone !== 'error',
                'border-red-200 bg-red-50 text-red-800' => $statusTone === 'error',
            ])
            role="status"
            wire:key="waitlist-status-{{ md5($status) }}"
        >{{ $status }}</p>
    @endif

    <form wire:submit="submit" class="space-y-5" novalidate>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <label for="waitlist-name-{{ $source }}" class="field-label">Full name <span class="text-[#b91c1c]">*</span></label>
                <input
                    id="waitlist-name-{{ $source }}"
                    type="text"
                    wire:model.blur="name"
                    maxlength="120"
                    placeholder="Your full name"
                    class="field"
                    aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                >
                @error('name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="waitlist-email-{{ $source }}" class="field-label">Work email <span class="text-[#b91c1c]">*</span></label>
                <input
                    id="waitlist-email-{{ $source }}"
                    type="email"
                    wire:model.blur="email"
                    maxlength="150"
                    placeholder="you@company.com"
                    class="field"
                    aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                >
                @error('email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="waitlist-role-{{ $source }}" class="field-label">I am joining as <span class="text-[#b91c1c]">*</span></label>
            <select
                id="waitlist-role-{{ $source }}"
                wire:model.blur="role"
                class="field"
                aria-invalid="{{ $errors->has('role') ? 'true' : 'false' }}"
            >
                <option value="">Select role</option>
                <option value="customer">Customer</option>
                <option value="driver">Driver</option>
                <option value="investor">Investor</option>
                <option value="admin">Admin team</option>
            </select>
            @error('role')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-gold btn-block" wire:loading.attr="disabled" wire:target="submit">
            <span wire:loading.remove wire:target="submit">Join the waitlist</span>
            <span class="inline-flex items-center gap-2" wire:loading wire:target="submit">
                <span class="spinner" aria-hidden="true"></span>
                Submitting
            </span>
        </button>
    </form>
</div>
