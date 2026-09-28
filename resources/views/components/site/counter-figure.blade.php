<?php

use Livewire\Component;

/**
 * Animated figure that counts up to its target the first time it scrolls
 * into view. Livewire's own viewport intersection directive drives the
 * trigger, so it keeps working under wire:navigate page transitions.
 */
new class extends Component
{
    public float $target = 0;

    public int $decimals = 0;

    public int $pad = 0;

    public string $prefix = '';

    public string $suffix = '';

    public string $variant = 'dark';

    public string $label = '';

    public bool $started = false;

    public function mount(
        float $target = 0,
        int $decimals = 0,
        int $pad = 0,
        string $prefix = '',
        string $suffix = '',
        string $variant = 'dark',
        string $label = '',
    ): void {
        $this->target = $target;
        $this->decimals = max(0, min(2, $decimals));
        $this->pad = max(0, $pad);
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $this->variant = in_array($variant, ['dark', 'light', 'gold'], true) ? $variant : 'dark';
        $this->label = $label;
    }

    /** Fired by wire:intersect the first time the figure is visible. */
    public function start(): void
    {
        $this->started = true;
    }

    /** Formatted starting value, rendered server-side so no-JS users see a figure. */
    public function initial(): string
    {
        return $this->format(0.0);
    }

    public function finalValue(): string
    {
        return $this->format($this->target);
    }

    public function classes(): string
    {
        return match ($this->variant) {
            'light' => 'stat-figure stat-figure-light',
            'gold' => 'stat-figure stat-figure-gold',
            default => 'stat-figure',
        };
    }

    protected function format(float $number): string
    {
        if ($this->decimals > 0) {
            return $this->prefix.number_format($number, $this->decimals).$this->suffix;
        }

        $formatted = (string) (int) round($number);

        if ($this->pad > 0) {
            $formatted = str_pad($formatted, $this->pad, '0', STR_PAD_LEFT);
        }

        return $this->prefix.$formatted.$this->suffix;
    }
};
?>

<div class="flex flex-col">
    <span
        @class([$this->classes()])
        wire:intersect.once="start"
        data-counter-final="{{ $this->finalValue() }}"
        @if (! $started)
            data-counter
            data-counter-target="{{ $target }}"
            data-counter-decimals="{{ $decimals }}"
            data-counter-pad="{{ $pad }}"
            data-counter-prefix="{{ $prefix }}"
            data-counter-suffix="{{ $suffix }}"
        @endif
    >{{ $started ? $this->finalValue() : $this->initial() }}</span>

    @if ($label !== '')
        <span @class([
            'stat-label',
            'text-white/55' => $variant === 'light',
            'text-[#475069]' => $variant === 'dark',
            'text-[#F59E0B]' => $variant === 'gold',
        ])>{{ $label }}</span>
    @endif
</div>
