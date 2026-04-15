@php
    $links = [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Services', 'route' => 'services'],
        ['label' => 'Contact', 'route' => 'contact'],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-gray-200 bg-white/95 backdrop-blur">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 md:px-10 lg:px-16" aria-label="Primary navigation">
        <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="GASCORP Nigeria home">
            <img src="{{ asset('1.png') }}" class="h-10 w-auto" alt="GASCORP Nigeria">
        </a>

        <div class="hidden items-center gap-8 md:flex">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @if (request()->routeIs($link['route'])) aria-current="page" @endif
                    class="border-b-2 py-2 text-sm font-semibold transition {{ request()->routeIs($link['route']) ? 'border-[#0E7A52] text-[#0E7A52]' : 'border-transparent text-gray-700 hover:border-[#D99A1E] hover:text-gray-950' }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        <a href="{{ route('contact') }}" class="hidden rounded-md bg-[#0E7A52] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#095F40] md:inline-flex">
            Request a Consultation
        </a>

        <button
            type="button"
            data-mobile-menu-toggle
            class="inline-flex h-11 w-11 items-center justify-center rounded-md border border-gray-200 text-gray-800 md:hidden"
            aria-controls="mobile-menu"
            aria-expanded="false"
            aria-label="Open navigation menu"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
            </svg>
        </button>
    </nav>

    <div id="mobile-menu" data-mobile-menu class="hidden border-t border-gray-200 bg-white px-5 py-4 md:hidden">
        <div class="mx-auto max-w-7xl space-y-1">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    class="block rounded-md px-3 py-3 text-base font-semibold transition {{ request()->routeIs($link['route']) ? 'bg-[#EAF6F0] text-[#0E7A52]' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-950' }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="{{ route('contact') }}" class="mt-3 block rounded-md bg-[#0E7A52] px-4 py-3 text-center font-bold text-white">
                Request a Consultation
            </a>
        </div>
    </div>
</header>
