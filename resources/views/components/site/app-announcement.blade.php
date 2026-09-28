<?php

use Livewire\Component;

/**
 * "GASCORP App coming soon" announcement modal.
 *
 * Shown once per browser on the marketing site — it is deliberately not rendered
 * on the app page itself, which *is* the announcement.
 *
 * Two independent guards keep it from becoming a nuisance:
 *  1. sessionStorage — the modal is only ever armed once per browser session, so
 *     wire:navigate page transitions cannot re-trigger it on every page.
 *  2. localStorage   — dismissing or acting on it snoozes the modal for
 *     `snoozeDays`, after which it may appear again for a new session.
 *
 * All persistence and open/close behaviour is Alpine (bundled with Livewire),
 * so the modal costs no network requests. Livewire owns the markup, the copy,
 * the cooldown window and the links.
 */
new class extends Component
{
    /** Days before a dismissed modal may be shown again. */
    public int $snoozeDays = 30;

    /** Seconds to wait after load before the modal opens. */
    public int $delaySeconds = 6;

    /** Announcement copy. */
    public string $eyebrow = 'Coming soon';

    public string $title = 'The GASCORP App is on the way.';

    public string $accent = 'Digital gas logistics, for every role on the corridor.';

    public string $description = 'Book movements, assign drivers, follow trips and track asset performance from one platform. Early access opens soon — join the waitlist to be onboarded first.';

    /** @var array<int, array<string, string>> */
    public array $highlights = [];

    public function mount(): void
    {
        $this->snoozeDays = max(1, $this->snoozeDays);
        $this->delaySeconds = max(0, $this->delaySeconds);

        $this->highlights = [
            ['title' => 'Book in minutes', 'body' => 'Route, capacity and price confirmed before dispatch.'],
            ['title' => 'Follow every trip', 'body' => 'Live movement, status stages and verified delivery proof.'],
            ['title' => 'See asset performance', 'body' => 'Utilisation, revenue by asset and owner wallet reporting.'],
        ];
    }

    /** Dismissal record key, namespaced so it cannot collide with host-page scripts. */
    public function storageKey(): string
    {
        return 'gascorp.app-announcement';
    }

    /** Once-per-session key, so navigation does not re-arm the modal. */
    public function sessionKey(): string
    {
        return 'gascorp.app-announcement.session';
    }

    /** Milliseconds of cooldown encoded into the stored record. */
    public function snoozeMs(): int
    {
        return $this->snoozeDays * 86400 * 1000;
    }
};
?>

<div
    x-data="{
        open: false,
        key: '{{ $this->storageKey() }}',
        sessionKey: '{{ $this->sessionKey() }}',
        cooldown: @js($this->snoozeMs()),
        delay: @js($this->delaySeconds * 1000),
        init() {
            if (this.armedAlready() || this.snoozed()) return;

            window.setTimeout(() => { this.reveal(); }, this.delay);
        },
        armedAlready() {
            try {
                if (sessionStorage.getItem(this.sessionKey)) return true;
                sessionStorage.setItem(this.sessionKey, '1');
            } catch (error) { /* storage unavailable — fall through and show */ }

            return false;
        },
        snoozed() {
            let stored = null;
            try { stored = JSON.parse(localStorage.getItem(this.key) || 'null'); } catch (error) { stored = null; }

            return Boolean(stored && typeof stored.until === 'number' && stored.until > Date.now());
        },
        reveal() {
            this.open = true;
            document.body.classList.add('modal-open');
            this.$nextTick(() => this.$refs.panel?.focus());
        },
        dismiss() {
            this.open = false;
            document.body.classList.remove('modal-open');
            try { localStorage.setItem(this.key, JSON.stringify({ until: Date.now() + this.cooldown })); } catch (error) { /* storage unavailable */ }
        },
    }"
    x-on:keydown.escape.window="open && dismiss()"
>
    {{-- Backdrop --}}
    <div
        x-cloak
        x-show="open"
        x-bind:class="open && 'is-open'"
        class="modal-backdrop fixed inset-0 z-[80] bg-[#0f172a]/70"
        x-on:click="dismiss()"
        aria-hidden="true"
    ></div>

    {{-- Panel --}}
    <div
        x-cloak
        x-show="open"
        x-bind:class="open && 'is-open'"
        class="modal-panel fixed inset-x-0 bottom-0 z-[85] mx-auto w-full max-w-2xl sm:inset-0 sm:my-auto sm:h-fit"
        role="dialog"
        aria-modal="true"
        aria-labelledby="app-announcement-title"
        aria-describedby="app-announcement-body"
    >
        <div
            x-ref="panel"
            tabindex="-1"
            class="relative max-h-[92vh] overflow-y-auto border border-[#e6e9ee] bg-white shadow-[0_40px_120px_-40px_rgba(15,23,42,0.6)] focus:outline-none"
        >
            <div class="hatch h-1.5 w-full" aria-hidden="true"></div>

            <button
                type="button"
                class="absolute right-3 top-4 z-10 inline-flex h-9 w-9 items-center justify-center rounded-full border border-[#e6e9ee] bg-white text-[#475069] transition hover:border-[#1E3A8A] hover:text-[#1E3A8A]"
                x-on:click="dismiss()"
                aria-label="Close announcement"
            >
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path stroke-linecap="round" d="M6 6l12 12M18 6 6 18" />
                </svg>
            </button>

            <div class="p-7 md:p-10">
                <div class="flex items-start gap-4 md:gap-5">
                    <span class="app-icon app-icon-lg shrink-0" aria-hidden="true">GC</span>

                    <div class="min-w-0">
                        <p class="label inline-flex items-center gap-2.5 border border-[#F59E0B]/50 bg-[#F59E0B]/8 px-3 py-1.5 text-[#b26f05]">
                            <span class="inline-block h-1.5 w-1.5 rounded-full bg-[#F59E0B]"></span>
                            {{ $eyebrow }}
                        </p>

                        <h2 id="app-announcement-title" class="display display-sm mt-4">
                            {{ $title }}
                        </h2>
                        <p class="mt-2 font-[Manrope] text-base font-semibold text-[#1E3A8A]">
                            {{ $accent }}
                        </p>
                    </div>
                </div>

                <p id="app-announcement-body" class="mt-6 text-[0.9375rem] leading-7 text-[#475069]">
                    {{ $description }}
                </p>

                <ul class="mt-7 grid gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] sm:grid-cols-3">
                    @foreach ($highlights as $highlight)
                        <li class="bg-white p-4">
                            <span class="block h-1.5 w-6 bg-[#F59E0B]" aria-hidden="true"></span>
                            <p class="mt-3 font-[Manrope] text-[0.8125rem] font-bold text-[#0f172a]">
                                {{ $highlight['title'] }}
                            </p>
                            <p class="mt-1.5 text-xs leading-6 text-[#475069]">
                                {{ $highlight['body'] }}
                            </p>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="{{ route('app.landing') }}#launch" class="btn btn-gold" wire:navigate x-on:click="dismiss()">
                        Join the waitlist
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </a>

                    <a href="{{ route('app.landing') }}" class="btn btn-outline" wire:navigate x-on:click="dismiss()">
                        See what it does
                    </a>

                    <button type="button" class="btn btn-ghost sm:ml-auto" x-on:click="dismiss()">
                        Not now
                    </button>
                </div>

                <p class="mt-5 border-t border-[#e6e9ee] pt-4 text-xs leading-6 text-[#475069]">
                    We will only show this once. You can also
                    <a href="{{ route('contact') }}" class="font-semibold text-[#1E3A8A] underline decoration-[#F59E0B] underline-offset-2" wire:navigate x-on:click="dismiss()">ask us directly</a>
                    about the rollout.
                </p>
            </div>
        </div>
    </div>
</div>
