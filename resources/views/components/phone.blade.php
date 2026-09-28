{{--
    Device mockup frame (placeholder).

    The frame and its screen are presentational: the whole element is marked
    aria-hidden so assistive technology reads the accompanying caption rather
    than a stream of fake UI text. Give each usage a visible caption.

    Usage:
        <x-phone size="lg" class="rotate-[-2deg]">
            <div class="scr"> ...screen content... </div>
        </x-phone>
--}}
@props([
    'size' => 'md',
    'label' => null,
])

@php
    $sizeClass = match ($size) {
        'sm' => 'phone-sm',
        'lg' => 'phone-lg',
        default => '',
    };
@endphp

<figure {{ $attributes->class(['phone', $sizeClass]) }}>
    <div class="phone-frame" aria-hidden="true">
        <div class="phone-screen">
            <span class="phone-notch"></span>
            {{ $slot }}
        </div>
    </div>

    @if ($label)
        <figcaption class="mt-4 text-center font-[DM_Mono,monospace] text-[0.625rem] uppercase tracking-[0.18em] text-[#475069]">
            {{ $label }}
        </figcaption>
    @endif
</figure>
