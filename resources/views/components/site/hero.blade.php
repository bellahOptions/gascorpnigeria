<?php

use Livewire\Component;

/**
 * Homepage hero.
 *
 * Editorial statement slide over full-bleed gas-infrastructure photography.
 * There is deliberately no gradient scrim: every slide uses the same solid ink
 * panel behind its copy, so wording stays legible over any photograph and the
 * image around the panel is never colour-washed.
 *
 * Implementation notes:
 *  - The slide is a real <img> (not a CSS background) so it can never be
 *    covered by an overlay element, and slide one is fetched eagerly.
 *  - Slides stretch to the section's min-height and centre their own copy, so
 *    shorter slides cannot leave a gap.
 */
new class extends Component
{
    /** @var array<int, array<string, string>> */
    public array $slides = [];

    public function mount(?array $slides = null): void
    {
        $this->slides = $slides ?? [
            [
                'eyebrow' => 'Gas processing & storage',
                'title' => 'Infrastructure that stabilises supply.',
                'accent' => 'Across cities and communities.',
                'description' => 'From regional depots to local storage hubs, we strengthen supply reliability so homes, businesses and industries always have dependable gas access.',
                'image' => 'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=2400&q=80',
                'alt' => 'Stainless steel gas processing pipework, pumps and storage vessels',
            ],
            [
                'eyebrow' => 'Virtual pipeline logistics',
                'title' => 'Moving energy smarter and faster.',
                'accent' => 'Where pipelines do not reach.',
                'description' => 'Our intermodal model combines high-pressure haulage, dispatch planning and distribution intelligence to deliver gas into markets that fixed pipelines never serve.',
                'image' => 'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&w=2400&q=80',
                'alt' => 'Gas haulage truck running a long-distance corridor route',
            ],
            [
                'eyebrow' => 'Terminals & intermodal',
                'title' => 'Connecting supply to demand.',
                'accent' => 'Road, rail and maritime.',
                'description' => 'Storage terminals and intermodal transfer points let us consolidate volume, switch transport mode and keep the corridor moving under load.',
                'image' => 'https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?auto=format&fit=crop&w=2400&q=80',
                'alt' => 'Intermodal terminal with gantry cranes and stacked freight',
            ],
            [
                'eyebrow' => 'Penetration & delivery',
                'title' => 'Built in the market, not at the map.',
                'accent' => 'Penetration you can count.',
                'description' => 'Skid plants, LCNG stations and distribution hubs are installed where the demand is, converting national supply into local, dependable access.',
                'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2400&q=80',
                'alt' => 'Construction team building gas distribution infrastructure on site',
            ],
        ];
    }
};
?>

<div>
<section class="hero-swiper swiper relative min-h-[86vh] overflow-hidden bg-[#0f172a] lg:min-h-[90vh]" aria-label="GASCORP introduction slideshow">
    <div class="swiper-wrapper">
        @foreach ($slides as $index => $slide)
            <div class="swiper-slide hero-slide relative flex items-center" data-slide="{{ $index }}">
                {{-- The photograph: a real image element, never overlaid by a gradient. --}}
                <img
                    src="{{ $slide['image'] }}"
                    alt="{{ $slide['alt'] ?? '' }}"
                    class="absolute inset-0 h-full w-full object-cover"
                    @if ($index === 0) fetchpriority="high" @else loading="lazy" @endif
                    decoding="async"
                >

                <div class="shell relative z-10 w-full py-16 md:py-20 lg:py-24">
                    <div class="hero-panel">
                        <p class="eyebrow eyebrow-light">{{ $slide['eyebrow'] }}</p>

                        <h1 class="display display-lg mt-6 text-white">
                            {{ $slide['title'] }}
                            <span class="block text-[#F59E0B]">{{ $slide['accent'] }}</span>
                        </h1>

                        <p class="lede mt-6 max-w-2xl text-white/80">{{ $slide['description'] }}</p>

                        <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:items-center">
                            <a href="{{ route('services') }}" class="btn btn-gold" wire:navigate>
                                Explore our solutions
                                <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                </svg>
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-light" wire:navigate>
                                Partner with us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Controls are hidden on mobile; CSS handles both offsets and visibility. --}}
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</section>

{{-- Evidence ticker --}}
<div class="bg-[#0f172a] py-4">
    <div class="shell">
        <div class="ticker" data-ticker>
            <div class="ticker-track" data-ticker-track>
                @foreach ([
                    'LPG for clean cooking',
                    'CNG for transportation',
                    'LNG for industry',
                    'Virtual pipeline logistics',
                    '774 LGA penetration strategy',
                    'Storage & terminal infrastructure',
                    'West African corridor expansion',
                ] as $item)
                    <span class="ticker-item">{{ $item }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
