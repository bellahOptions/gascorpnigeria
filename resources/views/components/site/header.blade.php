<?php

use Livewire\Component;

new class extends Component
{
    /** Grouped navigation map. */
    public array $nav = [];

    public function mount(): void
    {
        $this->nav = [
            [
                'label' => 'Company',
                'route' => 'about',
                'children' => [
                    ['label' => 'About GASCORP', 'route' => 'about', 'note' => 'Who we are and the mandate we carry'],
                    ['label' => 'Our Assets', 'route' => 'assets', 'note' => 'Storage, fleet and penetration infrastructure'],
                    ['label' => 'Our Impact', 'route' => 'about', 'fragment' => 'impact', 'note' => 'Value created across the gas chain'],
                ],
            ],
            [
                'label' => 'Services',
                'route' => 'services',
                'children' => [
                    ['label' => 'Gas Storage Solutions', 'route' => 'services', 'fragment' => 'storage'],
                    ['label' => 'Logistics & Transportation', 'route' => 'services', 'fragment' => 'logistics'],
                    ['label' => 'Penetration Infrastructure', 'route' => 'services', 'fragment' => 'penetration'],
                    ['label' => '774 LGA Distribution', 'route' => 'services', 'fragment' => 'penetration'],
                    ['label' => 'Fleet & Logistics Management', 'route' => 'services', 'fragment' => 'fleet'],
                    ['label' => 'Infrastructure Advisory', 'route' => 'services', 'fragment' => 'advisory'],
                ],
            ],
            ['label' => 'GASCORP App', 'route' => 'app.landing', 'children' => []],
            ['label' => 'Contact', 'route' => 'contact', 'children' => []],
        ];
    }

    public function isActive(string $route): bool
    {
        return request()->routeIs($route);
    }

    public function href(array $item): string
    {
        $url = route($item['route']);

        return isset($item['fragment']) ? $url.'#'.$item['fragment'] : $url;
    }
};
?>

<div>
    <div class="scroll-progress" data-scroll-progress aria-hidden="true"></div>

    <header class="site-header" data-site-header>
        <div class="utility-bar">
            <div class="shell flex h-9 items-center justify-between gap-6">
                <p class="hidden items-center gap-2.5 sm:flex">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-[#F59E0B]"></span>
                    Gas Corridor &amp; Penetration Ltd &middot; LPG &middot; CNG &middot; LNG
                </p>
                <div class="flex items-center gap-5">
                    <a href="tel:+2347038392520" class="transition hover:text-white">+234 703 839 2520</a>
                    <span class="hidden h-3 w-px bg-white/20 md:block"></span>
                    <a href="mailto:info@gascorpnigeria.com" class="hidden transition hover:text-white md:inline">info@gascorpnigeria.com</a>
                </div>
            </div>
        </div>

        <div class="relative" x-data="{ open: false }" @keydown.escape.window="open = false">
            <nav class="shell flex items-center justify-between gap-8 py-4" aria-label="Primary navigation">
                <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3" aria-label="GASCORP Nigeria home" wire:navigate>
                    <img src="{{ asset('1.png') }}" class="h-11 w-auto" alt="GASCORP Nigeria" width="937" height="281">
                </a>

                <ul class="hidden items-center gap-9 lg:flex">
                    <li>
                        <a href="{{ route('home') }}" class="nav-link" @if ($this->isActive('home')) aria-current="page" @endif wire:navigate>Home</a>
                    </li>

                    @foreach ($nav as $item)
                        <li class="nav-item relative">
                            <a
                                href="{{ $this->href($item) }}"
                                class="nav-link inline-flex items-center gap-1.5"
                                @if ($this->isActive($item['route'])) aria-current="page" @endif
                                wire:navigate
                            >
                                {{ $item['label'] }}
                                @if ($item['children'])
                                    <svg class="h-3 w-3 opacity-60" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                        <path d="M2.5 4.5 6 8l3.5-3.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @endif
                            </a>

                            @if ($item['children'])
                                <div class="submenu-panel">
                                    @foreach ($item['children'] as $child)
                                        <a href="{{ $this->href($child) }}" class="submenu-link" wire:navigate>
                                            <span class="block font-semibold">{{ $child['label'] }}</span>
                                            @isset($child['note'])
                                                <span class="mt-0.5 block text-xs font-normal text-[#475069]">{{ $child['note'] }}</span>
                                            @endisset
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>

                <div class="flex items-center gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-sm hidden md:inline-flex" wire:navigate>
                        Request a Consultation
                    </a>

                    <button
                        type="button"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-sm border border-[#e6e9ee] text-[#0f172a] transition hover:border-[#1E3A8A] hover:text-[#1E3A8A] lg:hidden"
                        @click="open = true"
                        :aria-expanded="open"
                        aria-controls="mobile-drawer"
                        aria-label="Open navigation menu"
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" d="M3.5 7h17M3.5 12h17M3.5 17h17" />
                        </svg>
                    </button>
                </div>
            </nav>

            <div x-cloak x-show="open" class="fixed inset-0 z-[70] lg:hidden" id="mobile-drawer" role="dialog" aria-modal="true" aria-label="Navigation menu">
                <div class="absolute inset-0 bg-[#0f172a]/60 backdrop-blur-sm" @click="open = false"></div>

                <div
                    class="absolute inset-y-0 right-0 flex w-full max-w-md flex-col overflow-y-auto bg-white shadow-2xl"
                    x-show="open"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                >
                    <div class="flex items-center justify-between border-b border-[#e6e9ee] px-6 py-4">
                        <img src="{{ asset('1.png') }}" class="h-9 w-auto" alt="GASCORP Nigeria">
                        <button
                            type="button"
                            class="inline-flex h-10 w-10 items-center justify-center rounded-sm border border-[#e6e9ee] text-[#0f172a]"
                            @click="open = false"
                            aria-label="Close navigation menu"
                        >
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" d="M6 6l12 12M18 6 6 18" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex-1 px-6 py-6">
                        <a href="{{ route('home') }}" class="drawer-link" wire:navigate>
                            Home
                            <svg class="h-4 w-4 text-[#F59E0B]" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </a>

                        @foreach ($nav as $item)
                            <div class="border-b border-[#e6e9ee] py-4">
                                <a href="{{ $this->href($item) }}" class="flex items-center justify-between gap-4 text-lg font-bold text-[#0f172a]" wire:navigate>
                                    {{ $item['label'] }}
                                    <svg class="h-4 w-4 text-[#F59E0B]" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                    </svg>
                                </a>

                                @if ($item['children'])
                                    <div class="mt-3 space-y-1">
                                        @foreach ($item['children'] as $child)
                                            <a href="{{ $this->href($child) }}" class="drawer-sub" wire:navigate>{{ $child['label'] }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <a href="{{ route('contact') }}" class="btn btn-gold btn-block mt-8" wire:navigate>
                            Request a Consultation
                        </a>

                        <div class="mt-8 space-y-2 border-t border-[#e6e9ee] pt-6 text-sm text-[#475069]">
                            <p class="font-bold text-[#0f172a]">Head Office</p>
                            <p>Ocean Parade Towers, 1st Avenue,<br>Banana Island, Ikoyi, Lagos</p>
                            <a href="tel:+2347038392520" class="block hover:text-[#1E3A8A]">+234 703 839 2520</a>
                            <a href="mailto:info@gascorpnigeria.com" class="block hover:text-[#1E3A8A]">info@gascorpnigeria.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script>
        (() => {
            if (window.__gasChromeBound) return;
            window.__gasChromeBound = true;

            let ticking = false;

            const update = () => {
                ticking = false;
                const bar = document.querySelector('[data-scroll-progress]');
                const header = document.querySelector('[data-site-header]');
                const doc = document.documentElement;
                const max = doc.scrollHeight - window.innerHeight;
                const progress = max > 0 ? Math.min((window.scrollY / max) * 100, 100) : 0;

                if (bar) bar.style.width = progress + '%';
                if (header) header.dataset.scrolled = window.scrollY > 24 ? 'true' : 'false';
            };

            const onScroll = () => {
                if (ticking) return;
                ticking = true;
                window.requestAnimationFrame(update);
            };

            window.addEventListener('scroll', onScroll, { passive: true });
            window.addEventListener('resize', onScroll, { passive: true });
            document.addEventListener('livewire:navigated', update);
            update();
        })();
    </script>
</div>
