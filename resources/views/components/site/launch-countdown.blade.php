<?php

use Carbon\CarbonImmutable;
use Livewire\Component;

/**
 * Launch countdown for the GASCORP App.
 *
 * Livewire computes the deadline and the remaining time on the server, so the
 * figure is authoritative and correct for no-JS visitors and for devices with a
 * skewed clock. The rendered attributes carry the deadline plus the server's
 * own timestamp; resources/js/app.js ticks the display locally once a second
 * from that anchor, so a live countdown costs no polling requests.
 */
new class extends Component
{
    /** Months from today until the estimated launch window. */
    public int $monthsAhead = 9;

    public function mount(int $monthsAhead = 9): void
    {
        $this->monthsAhead = max(1, $monthsAhead);
    }

    protected function launchDate(): CarbonImmutable
    {
        return CarbonImmutable::now()
            ->addMonthsNoOverflow($this->monthsAhead)
            ->startOfDay();
    }

    public function launched(): bool
    {
        return $this->launchDate()->isPast();
    }

    /** Seconds remaining, floored at zero. */
    public function remainingSeconds(): int
    {
        return max(0, CarbonImmutable::now()->diffInSeconds($this->launchDate(), false));
    }

    /**
     * Countdown units, padded for a stable tabular display.
     *
     * @return array<int, array{unit: string, value: string, label: string}>
     */
    public function units(): array
    {
        $seconds = $this->remainingSeconds();

        return [
            ['unit' => 'days', 'value' => str_pad((string) intdiv($seconds, 86400), 3, '0', STR_PAD_LEFT), 'label' => 'Days'],
            ['unit' => 'hours', 'value' => str_pad((string) intdiv($seconds % 86400, 3600), 2, '0', STR_PAD_LEFT), 'label' => 'Hours'],
            ['unit' => 'minutes', 'value' => str_pad((string) intdiv($seconds % 3600, 60), 2, '0', STR_PAD_LEFT), 'label' => 'Minutes'],
            ['unit' => 'seconds', 'value' => str_pad((string) ($seconds % 60), 2, '0', STR_PAD_LEFT), 'label' => 'Seconds'],
        ];
    }

    public function launchWindow(): string
    {
        return $this->launchDate()->format('F Y');
    }
};
?>

@php
    $launched = $this->launched();
    $units = $this->units();
@endphp

<div>
    <dl
        class="grid grid-cols-2 gap-px overflow-hidden border border-white/12 bg-white/12 sm:grid-cols-4"
        aria-label="Estimated launch countdown"
        @unless ($launched)
            data-countdown
            data-countdown-target="{{ $this->launchDate()->getTimestampMs() }}"
            data-countdown-server="{{ Carbon\CarbonImmutable::now()->getTimestampMs() }}"
        @endunless
    >
        @foreach ($units as $unit)
            <div class="bg-[#0f172a] px-4 py-6 text-center">
                <dt class="sr-only">{{ $unit['label'] }} remaining</dt>
                <dd
                    class="mono-num text-3xl font-normal leading-none text-white md:text-4xl"
                    data-countdown-unit="{{ $unit['unit'] }}"
                >{{ $unit['value'] }}</dd>
                <p class="mt-3 font-[DM_Mono,monospace] text-[0.625rem] uppercase tracking-[0.18em] text-white/50" aria-hidden="true">
                    {{ $unit['label'] }}
                </p>
            </div>
        @endforeach
    </dl>

    <p class="mt-4 font-[DM_Mono,monospace] text-[0.6875rem] uppercase tracking-[0.18em] {{ $launched ? 'text-[#0a6f66]' : 'text-[#475069]' }}">
        @if ($launched)
            Now live &middot; request early access below
        @else
            Estimated launch window: {{ $this->launchWindow() }}
        @endif
    </p>
</div>
