<?php

use Livewire\Component;

/**
 * Scroll-reveal wrapper.
 *
 * Wraps arbitrary slot content and animates it into view on scroll.
 * The IntersectionObserver lives in resources/js/app.js and is duplicated by
 * the wire:intersect directive so it still fires under Livewire navigation.
 */
new class extends Component
{
    /** Toggled by the wire:intersect directive. */
    public bool $revealed = false;

    /** Delay in milliseconds before the reveal transition starts. */
    public int $delay = 0;

    /** Stagger index — multiplied by 80ms when `$stagger` is true. */
    public int $index = 0;

    public bool $stagger = false;

    public string $as = 'div';

    public function mount(int $delay = 0, int $index = 0, bool $stagger = false, string $as = 'div'): void
    {
        $this->delay = max(0, $delay);
        $this->index = max(0, $index);
        $this->stagger = $stagger;
        $this->as = in_array($as, ['div', 'section', 'article', 'li', 'span', 'figure'], true) ? $as : 'div';
    }

    public function totalDelay(): int
    {
        return $this->stagger ? $this->delay + ($this->index * 80) : $this->delay;
    }

    public function isRevealed(): bool
    {
        return $this->revealed;
    }
};
?>

<{{ $as }}
    @if ($this->isRevealed()) data-reveal="in" @else data-reveal @endif
    @if ($this->totalDelay() > 0) style="transition-delay: {{ $this->totalDelay() }}ms" @endif
    {{ $attributes }}
>
    {{ $slot }}
</{{ $as }}>
