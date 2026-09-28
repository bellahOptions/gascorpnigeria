@extends('layouts.theme')
@section('title', 'Our Services')
@section('meta_title', 'Gas Services | LPG, CNG and LNG Logistics in Nigeria')
@section('meta_description', 'Explore GASCORP Nigeria services across gas storage, transportation, penetration infrastructure and advisory for LPG, CNG and LNG projects.')
@section('meta_keywords', 'gas services Nigeria, LPG storage, CNG transportation, LNG logistics, gas advisory, virtual pipeline')
@section('canonical', route('services'))
@section('og_image', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2000&q=80')
@section('theme_color', '#12335F')

@push('structured_data')
    <script type="application/ld+json">
                {{-- Schema.org keys are written without their "@" prefix and restored after
             encoding: Blade would otherwise compile "@context" as a directive. --}}
{!! strtr(json_encode([
            'context' => 'https://schema.org',
            'type' => 'Service',
            'name' => 'Integrated Gas Infrastructure and Logistics Services',
            'provider' => [
                'type' => 'Organization',
                'name' => 'Gas Corridor and Penetration Ltd',
                'url' => url('/'),
            ],
            'areaServed' => 'Nigeria and West Africa',
            'url' => route('services'),
            'description' => 'Storage, transport, penetration infrastructure and operational advisory for LPG, CNG and LNG systems.',
            'hasOfferCatalog' => [
                'type' => 'OfferCatalog',
                'name' => 'GASCORP service catalogue',
                'itemListElement' => [
                    ['type' => 'Offer', 'itemOffered' => ['type' => 'Service', 'name' => 'Gas Storage Solutions']],
                    ['type' => 'Offer', 'itemOffered' => ['type' => 'Service', 'name' => 'Gas Logistics and Transportation']],
                    ['type' => 'Offer', 'itemOffered' => ['type' => 'Service', 'name' => 'Gas Penetration Infrastructure']],
                    ['type' => 'Offer', 'itemOffered' => ['type' => 'Service', 'name' => '774 LGA Distribution Model']],
                    ['type' => 'Offer', 'itemOffered' => ['type' => 'Service', 'name' => 'Fleet and Logistics Management']],
                    ['type' => 'Offer', 'itemOffered' => ['type' => 'Service', 'name' => 'Infrastructure and Logistics Advisory']],
                ],
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), ['"context"' => '"'.chr(64).'context"', '"type"' => '"'.chr(64).'type"']) !!}
    </script>
@endpush

@section('content')
<main role="main">

    <livewire:site.page-hero
        eyebrow="What we do"
        title="Infrastructure, logistics and"
        accent="energy access solutions."
        description="GASCORP delivers integrated gas services that expand access, strengthen supply and support cleaner energy adoption across Nigeria and West Africa."
        :image="'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2200&q=80'"
        breadcrumb="Services"
    />

    {{-- ================================================================
         Service directory (Livewire accordion)
         ================================================================ --}}
    <section class="section" aria-labelledby="services-directory">
        <div class="shell">
            <div class="grid gap-10 lg:grid-cols-12 lg:items-end">
                <div class="lg:col-span-7">
                    <p class="eyebrow">Service directory</p>
                    <h2 id="services-directory" class="display display-lg mt-6">
                        End-to-end gas services built to scale.
                    </h2>
                </div>
                <div class="lg:col-span-5">
                    <p class="text-[1.0625rem] leading-8 text-[#475069]">
                        From storage and transport to market penetration and advisory, each service is designed to
                        make LPG, CNG and LNG more accessible, reliable and commercially viable.
                    </p>
                </div>
            </div>

            <div class="mt-14">
                @php
                    $services = [
                        [
                            'id' => 'storage',
                            'title' => 'Gas Storage Solutions',
                            'summary' => 'We develop and manage strategic storage capacity that keeps LPG, CNG and LNG flowing through demand peaks without interruption.',
                            'points' => ['Regional depot development', 'Local storage hub operation', 'Inventory and reserve planning'],
                            'outcomes' => ['Supply stability', 'Reduced price volatility', 'Strategic reserves for peak demand'],
                        ],
                        [
                            'id' => 'logistics',
                            'title' => 'Gas Logistics & Transportation',
                            'summary' => 'We move gas using specialised high-pressure and cryogenic trailers along virtual pipeline routes, reaching markets that fixed pipelines never will.',
                            'points' => ['Virtual pipeline systems', 'Intermodal road and maritime logistics', 'Cross-border distribution'],
                            'outcomes' => ['Bulk LPG haulage', 'CNG distribution networks', 'LNG cryogenic transport'],
                        ],
                        [
                            'id' => 'penetration',
                            'title' => 'Gas Penetration Infrastructure',
                            'summary' => 'We deploy the physical assets that create real access to gas where it is needed, not only where existing infrastructure happens to run.',
                            'points' => ['LPG skid plants', 'LCNG refuelling stations', 'Mini distribution hubs', 'Modular dispensing systems'],
                            'outcomes' => ['Gas access in new markets', 'Faster station rollout', 'Lower capital per location'],
                        ],
                        [
                            'id' => 'lga',
                            'title' => '774 LGA Distribution Model',
                            'summary' => 'Our decentralised distribution architecture is engineered to carry cleaner energy into urban, rural and underserved communities across all 774 Local Government Areas.',
                            'points' => ['Community-level distribution partners', 'Cylinder exchange networks', 'Off-grid LNG power solutions'],
                            'outcomes' => ['Firewood and charcoal displacement', 'Affordable energy for local business', 'Nationwide coverage pathway'],
                        ],
                        [
                            'id' => 'fleet',
                            'title' => 'Fleet & Logistics Management',
                            'summary' => 'We operate and manage a growing fleet of specialised gas trailers, with support for third-party fleet integration and optimisation.',
                            'points' => ['Dispatch coordination', 'Route monitoring', 'Delivery tracking', 'Fleet optimisation'],
                            'outcomes' => ['Higher asset utilisation', 'Measurable delivery performance', 'Lower cost per tonne delivered'],
                        ],
                        [
                            'id' => 'advisory',
                            'title' => 'Infrastructure & Logistics Advisory',
                            'summary' => 'We support partners with the systems, planning discipline and operational frameworks required to expand gas access efficiently.',
                            'points' => ['Gas logistics system design', 'Infrastructure deployment planning', 'Market penetration strategy', 'Operational coordination'],
                            'outcomes' => ['Bankable deployment plans', 'Reduced execution risk', 'Faster time to first delivery'],
                        ],
                    ];
                @endphp

                <livewire:site.services-accordion :services="$services" :open="'storage'" />
            </div>
        </div>
    </section>

    {{-- ================================================================
         Anchor sections for deep links (storage / logistics / penetration / fleet / advisory)
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="services-detail">
        <span id="storage" class="sr-only"></span>
        <div class="shell">
            <div class="max-w-3xl">
                <p class="eyebrow">How it fits together</p>
                <h2 id="services-detail" class="display display-lg mt-6">One corridor, four connected layers.</h2>
                <p class="lede mt-7">
                    Gas access fails when any layer is missing. Our model deliberately holds all four so a
                    commitment to a new market is a delivery commitment, not a hope.
                </p>
            </div>

            <div class="mt-16 space-y-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee]">
                @foreach ([
                    [
                        'anchor' => 'storage',
                        'label' => 'Layer 01 — Storage',
                        'title' => 'Strategic capacity that absorbs volatility',
                        'body' => 'Regional depots and local hubs hold reserves, smooth seasonal demand swings and give the transport fleet a reliable base to dispatch from.',
                        'image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Gas storage tanks at a regional depot',
                    ],
                    [
                        'anchor' => 'logistics',
                        'label' => 'Layer 02 — Logistics',
                        'title' => 'A virtual pipeline on wheels',
                        'body' => 'High-pressure and cryogenic trailers, planned dispatch and monitored routes carry gas to markets without a fixed pipeline connection.',
                        'image' => 'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Gas haulage trailers on the road',
                    ],
                    [
                        'anchor' => 'penetration',
                        'label' => 'Layer 03 — Penetration',
                        'title' => 'Infrastructure that creates demand',
                        'body' => 'Skid plants, LCNG stations and modular dispensing systems place gas supply physically inside the market, which is what converts availability into adoption.',
                        'image' => 'https://images.unsplash.com/photo-1615729947596-a598e5de0ab3?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Modular gas dispensing installation',
                    ],
                    [
                        'anchor' => 'fleet',
                        'label' => 'Layer 04 — Fleet',
                        'title' => 'Operations measured in real time',
                        'body' => 'Dispatch coordination, route monitoring and delivery tracking give partners visibility over every movement and give us the data to keep improving.',
                        'image' => 'https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Logistics dispatch control room',
                    ],
                ] as $index => $layer)
                    <div id="{{ $layer['anchor'] }}-layer" class="scroll-mt-32 bg-white">
                        <livewire:site.reveal :index="$index" :stagger="true" :key="'layer-'.$layer['anchor']">
                            <article class="grid gap-0 lg:grid-cols-12">
                                <div @class(['order-2 p-8 md:p-12 lg:order-1 lg:col-span-7', 'lg:order-2' => $index % 2 === 1])>
                                    <p class="label text-[#F59E0B]">{{ $layer['label'] }}</p>
                                    <h3 class="heading heading-md mt-4">{{ $layer['title'] }}</h3>
                                    <p class="mt-4 max-w-xl text-[0.975rem] leading-8 text-[#475069]">{{ $layer['body'] }}</p>
                                </div>
                                <div @class(['thumb order-1 aspect-[16/10] lg:order-2 lg:col-span-5 lg:aspect-auto lg:min-h-[18rem]', 'lg:order-1' => $index % 2 === 1])>
                                    <img src="{{ $layer['image'] }}" alt="{{ $layer['alt'] }}" loading="lazy">
                                </div>
                            </article>
                        </livewire:site.reveal>
                    </div>
                @endforeach
            </div>

            <span id="advisory" class="sr-only"></span>
        </div>
    </section>

    {{-- ================================================================
         Industries served
         ================================================================ --}}
    <section class="section" aria-labelledby="services-industries">
        <div class="shell">
            <div class="max-w-3xl">
                <p class="eyebrow">Industries we serve</p>
                <h2 id="services-industries" class="display display-lg mt-6">Serving diverse energy and commercial needs.</h2>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] sm:grid-cols-2 lg:grid-cols-5">
                @foreach ([
                    ['Energy companies', 'Upstream, midstream and downstream partners needing dependable offtake logistics.', 'M13 2 3 14h7l-1 8 10-12h-7l1-8Z'],
                    ['Industrial manufacturers', 'Continuous-process plants replacing diesel and heavy fuel oil with gas.', 'M3 21V9l5 3V9l5 3V6l5 3v12H3Z'],
                    ['Transport operators', 'Fleet owners converting to CNG for lower running costs and cleaner emissions.', 'M3 17V7h9v10H3Zm10-5h3l3 3v2h-6v-5ZM6 20a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm11 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z'],
                    ['Government projects', 'State and federal programmes aimed at domestic gas utilisation.', 'M4 21V10h16v11M9 21V14h6v7M12 3l8 5H4l8-5Z'],
                    ['Commercial & residential', 'Estates, hospitality and retail markets moving to cleaner cooking energy.', 'M12 3 3 9v12h6v-6h6v6h6V9l-9-6Z'],
                ] as $index => $industry)
                    <livewire:site.reveal :index="$index" :stagger="true" :key="'industry-'.$index" class="bg-white">
                        <article class="flex h-full flex-col p-7">
                            <span class="inline-flex h-11 w-11 items-center justify-center rounded-full bg-[#1E3A8A]/8 text-[#1E3A8A]">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $industry[2] }}" />
                                </svg>
                            </span>
                            <h3 class="heading mt-5 text-base leading-snug">{{ $industry[0] }}</h3>
                            <p class="mt-2.5 text-sm leading-7 text-[#475069]">{{ $industry[1] }}</p>
                        </article>
                    </livewire:site.reveal>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================================================================
         CTA
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="services-cta">
        <div class="shell">
            <div class="relative overflow-hidden bg-[#0f172a] px-6 py-16 md:px-16 md:py-20">
                <div class="grid-lines absolute inset-0"></div>

                <div class="relative grid gap-10 lg:grid-cols-12 lg:items-center">
                    <div class="lg:col-span-8">
                        <p class="eyebrow eyebrow-light">Let's build together</p>
                        <h2 id="services-cta" class="display display-md mt-6 max-w-3xl text-white">
                            Need reliable gas infrastructure or logistics support?
                        </h2>
                        <p class="lede mt-6 max-w-2xl text-white/70">
                            Tell us the market, the volume and the timeline. We will come back with a deployment
                            approach built around infrastructure, logistics and delivery systems designed for long-term impact.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 lg:col-span-4 lg:items-end">
                        <a href="{{ route('contact') }}" class="btn btn-gold btn-lg w-full lg:w-auto" wire:navigate>
                            Start your project
                            <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </a>
                        <a href="{{ route('assets') }}" class="btn btn-outline-light w-full lg:w-auto" wire:navigate>Review our assets</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection