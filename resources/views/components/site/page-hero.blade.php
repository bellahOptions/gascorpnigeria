<?php

use Livewire\Component;

/**
 * Standard interior page hero: photograph, scrim, eyebrow, display headline
 * and a supporting paragraph. Used by every page except the homepage.
 */
new class extends Component
{
    public string $eyebrow = '';

    public string $title = '';

    public string $accent = '';

    public string $description = '';

    public string $image = '';

    public string $align = 'left';

    public ?string $breadcrumb = null;

    public function mount(
        string $eyebrow = '',
        string $title = '',
        string $accent = '',
        string $description = '',
        string $image = '',
        string $align = 'left',
        ?string $breadcrumb = null,
    ): void {
        $this->eyebrow = $eyebrow;
        $this->title = $title;
        $this->accent = $accent;
        $this->description = $description;
        $this->image = $image;
        $this->align = in_array($align, ['left', 'center'], true) ? $align : 'left';
        $this->breadcrumb = $breadcrumb;
    }
};
?>

<section
    class="relative isolate overflow-hidden bg-[#0f172a] bg-image-fill"
    @if ($image !== '') style="background-image: url('{{ $image }}');" @endif
>
    {{-- Solid scrim only — no gradients anywhere on the site. --}}
    <div class="absolute inset-0 bg-[#0f172a]/80"></div>

    <div class="shell relative py-20 md:py-28 lg:py-32">
        <div @class(['max-w-4xl', 'mx-auto text-center' => $align === 'center'])>
            @if ($breadcrumb)
                <nav aria-label="Breadcrumb" @class(['mb-7', 'flex justify-center' => $align === 'center'])>
                    <ol class="flex items-center gap-2.5 font-[DM_Mono,monospace] text-[0.6875rem] uppercase tracking-[0.18em] text-white/50">
                        <li><a href="{{ route('home') }}" class="transition hover:text-white" wire:navigate>Home</a></li>
                        <li aria-hidden="true">/</li>
                        <li class="text-[#F59E0B]">{{ $breadcrumb }}</li>
                    </ol>
                </nav>
            @endif

            @if ($eyebrow !== '')
                <p @class(['eyebrow eyebrow-light', 'eyebrow-plain' => $align === 'center'])>{{ $eyebrow }}</p>
            @endif

            <h1 class="display display-lg mt-6 text-white">
                {{ $title }}
                @if ($accent !== '')
                    <span class="block text-[#F59E0B]">{{ $accent }}</span>
                @endif
            </h1>

            @if ($description !== '')
                <p @class(['lede mt-7 text-white/80', 'mx-auto max-w-3xl' => $align === 'center', 'max-w-3xl' => $align !== 'center'])>
                    {{ $description }}
                </p>
            @endif

            @isset($actions)
                <div @class(['mt-10 flex flex-col gap-3 sm:flex-row', 'sm:justify-center' => $align === 'center'])>
                    {{ $actions }}
                </div>
            @endisset
        </div>
    </div>
</section>
