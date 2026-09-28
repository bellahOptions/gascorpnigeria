@extends('layouts.theme')
@section('title', 'Home')
@section('meta_title', 'GASCORP Nigeria | Gas Infrastructure and Logistics')
@section('meta_description', 'GASCORP Nigeria builds integrated LPG, CNG and LNG infrastructure with storage, logistics and last-mile delivery systems across Nigeria and West Africa.')
@section('meta_keywords', 'gas infrastructure Nigeria, LPG logistics, CNG distribution, LNG transport, GASCORP Nigeria, virtual pipeline')
@section('canonical', route('home'))
@section('og_image', asset('bg.jpg'))
@section('theme_color', '#0F2B5E')

@push('structured_data')
    <script type="application/ld+json">
        {{--
            Schema.org keys are written without their "@" prefix and restored after
            encoding, because Blade would otherwise treat chr(64)."context"/"@type" as
            directives while compiling this view.
        --}}
                {{-- Schema.org keys are written without their "@" prefix and restored after
             encoding: Blade would otherwise compile "@context" as a directive. --}}
{!! strtr(json_encode([
            'context' => 'https://schema.org',
            'type' => 'WebPage',
            'name' => 'GASCORP Nigeria - Home',
            'description' => 'Integrated LPG, CNG and LNG infrastructure and logistics for energy access across Nigeria and West Africa.',
            'url' => route('home'),
            'isPartOf' => [
                'type' => 'WebSite',
                'name' => 'GASCORP Nigeria',
                'url' => url('/'),
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), ['"context"' => '"'.chr(64).'context"', '"type"' => '"'.chr(64).'type"']) !!}
    </script>
@endpush

@section('content')
<main role="main">

    <livewire:site.hero />

    {{-- ================================================================
         01 — Orientation + evidence
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="home-orientation">
        <div class="shell grid gap-14 lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-5">
                <p class="eyebrow">Gas corridor &amp; penetration</p>

                <h2 id="home-orientation" class="display display-lg mt-6 text-[#0f172a]">
                    Africa's gas is abundant. Access is not.
                </h2>

                <p class="lede mt-7">
                    GASCORP exists to close that gap. We integrate storage, transportation and penetration
                    infrastructure into a single operating system that expands cleaner energy access for households,
                    businesses, industries and underserved communities.
                </p>

                <p class="mt-5 text-[1.0625rem] leading-8 text-[#475069]">
                    Our long-term mandate is simple but transformative: make gas available in all
                    <strong class="font-bold text-[#0f172a]">774 Local Government Areas</strong> in Nigeria, then extend that
                    corridor across the ECOWAS region.
                </p>

                <div class="mt-9 flex flex-wrap gap-3">
                    <a href="{{ route('about') }}" class="btn btn-primary" wire:navigate>
                        Learn more about us
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </a>
                    <a href="{{ route('assets') }}" class="btn btn-outline" wire:navigate>See our assets</a>
                </div>
            </div>

            <div class="lg:col-span-7">
                <figure class="media-frame relative aspect-[4/3] lg:aspect-[5/4]">
                    <img
                        src="https://www.bakerhughes.com/sites/bakerhughes/files/styles/small_2_1_768x380_/public/2024-11/shutterstock_63056098.jpg?h=b80a9625&itok=_Nz8SHJG"
                        alt="Gas processing and distribution infrastructure operated to GASCORP standards"
                        loading="lazy"
                    >
                    <figcaption class="absolute bottom-0 left-0 bg-[#0f172a]/92 px-6 py-5 backdrop-blur-sm">
                        <p class="label text-[#F59E0B]">Integrated model</p>
                        <p class="mt-2 max-w-xs font-[Sora] text-base font-semibold leading-snug text-white">
                            Storage, logistics and last-mile penetration under one accountable operator.
                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>

        <div class="shell mt-20">
            <livewire:site.stat-strip />
        </div>
    </section>

    {{-- ================================================================
         02 — Vision
         ================================================================ --}}
    <section class="section surface-ink relative overflow-hidden" aria-labelledby="home-vision">
        <div class="grid-lines absolute inset-0"></div>

        <div class="shell relative">
            <p class="eyebrow eyebrow-light eyebrow-plain">Our vision</p>

            <blockquote class="mt-8 max-w-5xl">
                <p id="home-vision" class="display display-lg text-white">
                    To be Africa's most reliable, scalable and technology-driven gas corridor —
                    <span class="text-[#F59E0B]">enabling clean energy adoption across every sector.</span>
                </p>
            </blockquote>

            <div class="mt-14 max-w-3xl">
                <p class="lede text-white/70">
                    We are not simply moving gas. We are building the systems that make gas accessible, affordable
                    and reliable — connecting supply to demand with infrastructure and delivery intelligence designed
                    for the long term.
                </p>
            </div>
        </div>
    </section>

    {{-- ================================================================
         03 — Strategic pillars
         ================================================================ --}}
    <section class="section" aria-labelledby="home-pillars">
        <div class="shell">
            <div class="grid gap-8 lg:grid-cols-12 lg:items-end">
                <div class="lg:col-span-7">
                    <p class="eyebrow">Strategic pillars</p>
                    <h2 id="home-pillars" class="display display-lg mt-6">Four priorities shaping how we deliver energy.</h2>
                </div>
                <div class="lg:col-span-5">
                    <p class="text-[1.0625rem] leading-8 text-[#475069]">
                        Each pillar answers a specific failure point in the gas value chain — supply reliability,
                        market access, operational capability and an integrated commercial model.
                    </p>
                </div>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    [
                        'index' => '01',
                        'title' => 'Stabilise Supply',
                        'body' => 'Develop regional depots and local storage hubs that hold strategic reserves and absorb demand peaks without breaking supply.',
                        'route' => 'services',
                        'fragment' => 'storage',
                    ],
                    [
                        'index' => '02',
                        'title' => 'Expand Access',
                        'body' => 'Deploy LPG skid plants, LCNG stations and modular dispensing systems that reach markets traditional pipelines never will.',
                        'route' => 'services',
                        'fragment' => 'penetration',
                    ],
                    [
                        'index' => '03',
                        'title' => 'Operate Smart',
                        'body' => 'Run a tracked, dispatch-driven fleet where every trailer, route and delivery is monitored, measured and optimised.',
                        'route' => 'services',
                        'fragment' => 'fleet',
                    ],
                    [
                        'index' => '04',
                        'title' => 'Integrate the Chain',
                        'body' => 'Hold storage, logistics, penetration and advisory inside one accountable operating model end to end.',
                        'route' => 'about',
                        'fragment' => null,
                    ],
                ] as $index => $pillar)
                    <livewire:site.reveal :index="$index" :stagger="true" :key="'pillar-'.$index" class="bg-white">
                        <article class="card-numbered h-full">
                            <span class="card-index">{{ $pillar['index'] }}</span>
                            <h3 class="heading heading-sm mt-3">{{ $pillar['title'] }}</h3>
                            <p class="mt-2 text-[0.9375rem] leading-7 text-[#475069]">{{ $pillar['body'] }}</p>
                            <a
                                href="{{ route($pillar['route']) }}{{ $pillar['fragment'] ? '#'.$pillar['fragment'] : '' }}"
                                class="link-arrow mt-auto pt-6"
                            >
                                Explore
                                <svg class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                </svg>
                            </a>
                        </article>
                    </livewire:site.reveal>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================================================================
         04 — 774 mandate (editorial split)
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="home-mandate">
        <div class="shell">
            <div class="split split-wide-left items-center">
                <div>
                    <p class="eyebrow">Our strategy</p>
                    <h2 id="home-mandate" class="display display-lg mt-6">The 774 mandate.</h2>

                    <p class="lede mt-7">
                        A national gas corridor is only real when it reaches the last market, not the nearest one.
                        Our decentralised penetration model is built to put gas within reach of every Local
                        Government Area in Nigeria.
                    </p>

                    <div class="mt-10 space-y-0">
                        @foreach ([
                            ['Establishing local distribution hubs', 'Regional depots anchored by micro-distribution points that serve surrounding communities.'],
                            ['Partnering with regional stakeholders', 'State governments, cooperatives and private operators aligned behind shared supply commitments.'],
                            ['Deploying modular gas infrastructure', 'Skid-mounted plants, LPG/LCNG stations and dispensing systems that can be installed at market speed.'],
                            ['Enabling last-mile delivery systems', 'Cylinder exchange, bulk haulage and dispatch networks that carry gas the final distance.'],
                        ] as $index => $step)
                            <div class="row-num" @if ($index === 0) style="border-top:0" @endif>
                                <span class="row-num-index">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <h3 class="heading text-[1.05rem] leading-snug">{{ $step[0] }}</h3>
                                <p class="text-[0.9375rem] leading-7 text-[#475069]">{{ $step[1] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('services') }}#penetration" class="btn btn-primary mt-10" wire:navigate>
                        See the penetration model
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </a>
                </div>

                <div class="relative">
                    <figure class="media-frame aspect-[3/4]">
                        <img
                            src="https://images.unsplash.com/photo-1595246140625-573b715d11dc?auto=format&fit=crop&w=1400&q=80"
                            alt="LPG cylinder distribution serving a Nigerian community"
                            loading="lazy"
                        >
                    </figure>
                    <div class="hatch absolute -bottom-6 -left-6 hidden h-28 w-28 lg:block" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         05 — What we deliver
         ================================================================ --}}
    <section class="section" aria-labelledby="home-deliver">
        <div class="shell">
            <div class="flex flex-wrap items-end justify-between gap-8">
                <div class="max-w-2xl">
                    <p class="eyebrow">What we deliver</p>
                    <h2 id="home-deliver" class="display display-lg mt-6">
                        Energy solutions built for access, growth and reliability.
                    </h2>
                </div>
                <a href="{{ route('services') }}" class="link-arrow" wire:navigate>
                    All services
                    <svg class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </a>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-2">
                @foreach ([
                    [
                        'title' => 'Reliable LPG for clean cooking',
                        'body' => 'Expanding access to cleaner household energy that reduces dependence on firewood and charcoal while improving convenience and safety.',
                        'image' => 'https://pumaenergy.com/wp-content/uploads/2023/07/RS44410_10-2-scr.jpg.webp',
                        'alt' => 'LPG cylinders prepared for household distribution',
                        'tag' => 'Households',
                    ],
                    [
                        'title' => 'Affordable CNG for transportation',
                        'body' => 'Supporting cleaner, lower-cost mobility through dependable CNG distribution networks and strategically placed refuelling points.',
                        'image' => 'https://images.hindustantimes.com/auto/img/2021/07/01/600x338/CNG_Boot_Space_1579603511215_1625111599636.jpg',
                        'alt' => 'CNG refuelling infrastructure for vehicles',
                        'tag' => 'Mobility',
                    ],
                    [
                        'title' => 'Scalable LNG for industry',
                        'body' => 'Delivering LNG to industrial users, off-grid applications and energy-intensive operations that cannot tolerate an interrupted fuel supply.',
                        'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Methanier_aspher_LNGRIVERS.jpg',
                        'alt' => 'LNG carrier vessel supporting industrial supply',
                        'tag' => 'Industry',
                    ],
                    [
                        'title' => 'End-to-end gas logistics',
                        'body' => 'Combining storage, transport, virtual pipeline systems and penetration infrastructure so gas reaches the markets that need it most.',
                        'image' => 'https://www.woodwayenergy.com/wp-content/uploads/2023/11/How-Is-Natural-Gas-Transported.jpg',
                        'alt' => 'Gas transportation fleet moving between depots',
                        'tag' => 'Logistics',
                    ],
                ] as $index => $card)
                    <livewire:site.reveal :index="$index" :stagger="true" :key="'deliver-'.$index">
                        <article class="card card-hover group h-full overflow-hidden">
                            <div class="thumb aspect-[16/10]">
                                <img src="{{ $card['image'] }}" alt="{{ $card['alt'] }}" loading="lazy">
                            </div>
                            <div class="p-7 md:p-9">
                                <p class="label text-[#F59E0B]">{{ $card['tag'] }}</p>
                                <h3 class="heading heading-sm mt-3">{{ $card['title'] }}</h3>
                                <p class="mt-3 text-[0.9375rem] leading-7 text-[#475069]">{{ $card['body'] }}</p>
                            </div>
                        </article>
                    </livewire:site.reveal>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================================================================
         06 — Core values (C.R.I.S.P. equivalent)
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="home-values">
        <div class="shell">
            <div class="max-w-3xl">
                <p class="eyebrow">How we operate</p>
                <h2 id="home-values" class="display display-lg mt-6">Five commitments behind every delivery.</h2>
                <p class="lede mt-7">
                    Safety, transparency and operational discipline are not slogans on this corridor — they are the
                    conditions under which gas infrastructure earns its licence to operate.
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] sm:grid-cols-2 lg:grid-cols-5">
                @foreach ([
                    ['letter' => 'S', 'title' => 'Safety', 'body' => 'Every load, route and installation is planned around harm elimination first.'],
                    ['letter' => 'R', 'title' => 'Reliability', 'body' => 'Supply commitments are engineering commitments, not aspirations.'],
                    ['letter' => 'I', 'title' => 'Integrity', 'body' => 'Transparent pricing, transparent tracking, transparent reporting.'],
                    ['letter' => 'P', 'title' => 'Penetration', 'body' => 'We measure success by markets opened, not loads moved.'],
                    ['letter' => 'C', 'title' => 'Collaboration', 'body' => 'We grow through partnerships with states, communities and operators.'],
                ] as $index => $value)
                    <livewire:site.reveal :index="$index" :stagger="true" :as="'div'" :key="'value-'.$index" class="bg-white">
                        <article class="flex h-full flex-col p-7">
                            <span class="display text-5xl leading-none text-[#F59E0B]">{{ $value['letter'] }}</span>
                            <h3 class="heading mt-5 text-lg">{{ $value['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-[#475069]">{{ $value['body'] }}</p>
                        </article>
                    </livewire:site.reveal>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================================================================
         07 — GASCORP App band
         ================================================================ --}}
    <section class="relative overflow-hidden bg-[#0f172a]" aria-labelledby="home-app">
        <div class="grid-lines absolute inset-0"></div>

        <div class="shell relative grid gap-12 py-20 lg:grid-cols-12 lg:items-center lg:gap-16 lg:py-28">
            <div class="lg:col-span-7">
                <p class="label inline-flex items-center gap-2.5 border border-[#F59E0B]/40 px-3.5 py-2 text-[#F59E0B]">
                    <span class="inline-block h-1.5 w-1.5 animate-pulse rounded-full bg-[#F59E0B]"></span>
                    Pre-launch &middot; 2026 intake
                </p>

                <h2 id="home-app" class="display display-lg mt-7 text-white">
                    Digital gas logistics, built for the corridor.
                </h2>

                <p class="lede mt-7 max-w-2xl text-white/70">
                    The GASCORP App puts booking, dispatch, driver operations and asset performance on one
                    synchronised platform — live corridor intelligence for customers, fleet partners and investors.
                </p>

                <div class="mt-9 flex flex-wrap gap-3">
                    <a href="{{ route('app.landing') }}#launch" class="btn btn-gold">
                        Join the waitlist
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </a>
                    <a href="{{ route('app.landing') }}" class="btn btn-outline-light" wire:navigate>Explore the product</a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <dl class="grid grid-cols-2 gap-px overflow-hidden border border-white/12 bg-white/12">
                    @foreach ([
                        ['24/7', 'Trip visibility'],
                        ['4', 'Role-based experiences'],
                        ['Live', 'Corridor intelligence'],
                        ['Zero', 'Paper dispatch'],
                    ] as $stat)
                        <div class="bg-[#0f172a] p-6">
                            <dt class="stat-figure stat-figure-gold text-3xl">{{ $stat[0] }}</dt>
                            <dd class="stat-label text-white/50">{{ $stat[1] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </section>

    {{-- ================================================================
         08 — Closing CTA
         ================================================================ --}}
    <section class="section" aria-labelledby="home-cta">
        <div class="shell">
            <div class="relative overflow-hidden bg-[#F9FAFB] px-6 py-16 md:px-16 md:py-20">
                <div class="hatch absolute inset-y-0 left-0 w-1.5" aria-hidden="true"></div>

                <div class="grid gap-10 lg:grid-cols-12 lg:items-center">
                    <div class="lg:col-span-8">
                        <p class="eyebrow">Let's build the corridor</p>
                        <h2 id="home-cta" class="display display-md mt-6 max-w-3xl">
                            Ready to be part of Nigeria's energy transition?
                        </h2>
                        <p class="lede mt-6 max-w-2xl">
                            Partner with GASCORP to expand clean energy access, strengthen gas infrastructure and
                            power long-term growth across Nigeria and West Africa.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 lg:col-span-4 lg:items-end">
                        <a href="{{ route('contact') }}" class="btn btn-gold btn-lg w-full lg:w-auto" wire:navigate>
                            Partner with GASCORP
                            <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </a>
                        <a href="tel:+2347038392520" class="btn btn-outline w-full lg:w-auto">+234 703 839 2520</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection