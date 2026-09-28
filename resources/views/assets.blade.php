@extends('layouts.theme')
@section('title', 'Our Assets')
@section('meta_title', 'Our Assets | Gas Storage, Fleet and Penetration Infrastructure')
@section('meta_description', 'Review the GASCORP Nigeria asset base: strategic storage, specialised gas haulage fleet, virtual pipeline systems and penetration infrastructure across the corridor.')
@section('meta_keywords', 'GASCORP assets, gas trailers Nigeria, LPG storage capacity, CNG station infrastructure, virtual pipeline fleet')
@section('canonical', route('assets'))
@section('og_image', 'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&w=2000&q=80')
@section('theme_color', '#0F2B5E')

@push('structured_data')
    <script type="application/ld+json">
                {{-- Schema.org keys are written without their "@" prefix and restored after
             encoding: Blade would otherwise compile "@context" as a directive. --}}
{!! strtr(json_encode([
            'context' => 'https://schema.org',
            'type' => 'CollectionPage',
            'name' => 'GASCORP Asset Base',
            'description' => 'Storage, fleet and penetration assets operated by Gas Corridor and Penetration Ltd.',
            'url' => route('assets'),
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

    <livewire:site.page-hero
        eyebrow="Our assets"
        title="Infrastructure you can"
        accent="actually count."
        description="Storage capacity, a specialised haulage fleet and modular penetration infrastructure — the physical base that turns a gas corridor commitment into delivered energy."
        :image="'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&w=2200&q=80'"
        breadcrumb="Our Assets"
    />

    {{-- ================================================================
         Asset register (Livewire explorer)
         ================================================================ --}}
    <section class="section" aria-labelledby="assets-register">
        <div class="shell">
            <div class="grid gap-10 lg:grid-cols-12 lg:items-end">
                <div class="lg:col-span-7">
                    <p class="eyebrow">Asset register</p>
                    <h2 id="assets-register" class="display display-lg mt-6">The corridor, item by item.</h2>
                </div>
                <div class="lg:col-span-5">
                    <p class="text-[1.0625rem] leading-8 text-[#475069]">
                        Filter the register by category to see coverage and capacity for each class of asset.
                        Expand any row for the operational role it plays in the network.
                    </p>
                </div>
            </div>

            <div class="mt-14">
                @php
                    $assets = [
                        [
                            'name' => 'Strategic regional depots',
                            'category' => 'storage',
                            'category_label' => 'Storage',
                            'coverage' => 'Multi-state',
                            'capacity' => 'Bulk LPG / CNG',
                            'detail' => 'Regional depots hold strategic reserves and act as the dispatch origin for the haulage fleet. Each depot is designed for rail-adjacent or highway-adjacent siting so inbound and outbound movements are not constrained by urban traffic.',
                            'roles' => ['Absorb seasonal demand peaks', 'Anchor local hub replenishment', 'Hold strategic reserve inventory'],
                        ],
                        [
                            'name' => 'Local storage hubs',
                            'category' => 'storage',
                            'category_label' => 'Storage',
                            'coverage' => 'City & LGA level',
                            'capacity' => 'Modular, expandable',
                            'detail' => 'Local hubs sit closer to demand and shorten the last-mile leg. They are built from modular capacity blocks so a hub can grow with the market it serves without a greenfield rebuild.',
                            'roles' => ['Shorten last-mile distance', 'Buffer intra-city demand swings', 'Support cylinder exchange networks'],
                        ],
                        [
                            'name' => 'High-pressure gas trailers',
                            'category' => 'fleet',
                            'category_label' => 'Fleet',
                            'coverage' => 'National corridor',
                            'capacity' => '100 → 300+ units',
                            'detail' => 'Specialised high-pressure trailers form the virtual pipeline. Tube trailer configurations are matched to route profile, payload requirement and the receiving site decanting arrangement.',
                            'roles' => ['Serve markets without pipelines', 'Carry CNG and LPG payloads', 'Scale capacity by route demand'],
                        ],
                        [
                            'name' => 'Cryogenic LNG trailers',
                            'category' => 'fleet',
                            'category_label' => 'Fleet',
                            'coverage' => 'Industrial corridors',
                            'capacity' => 'Cryogenic specification',
                            'detail' => 'Cryogenic units move LNG at temperature to industrial and off-grid power customers, with boil-off management planned into every route and holding period.',
                            'roles' => ['Supply industrial offtakers', 'Enable off-grid LNG power', 'Extend reach beyond CNG economics'],
                        ],
                        [
                            'name' => 'LPG skid plants',
                            'category' => 'penetration',
                            'category_label' => 'Penetration',
                            'coverage' => 'Community level',
                            'capacity' => 'Modular skid-mounted',
                            'detail' => 'Skid-mounted LPG plants deploy quickly into markets that cannot justify a full station buildout. They establish a physical supply point and a local operator relationship at the same time.',
                            'roles' => ['Create last-mile supply points', 'Convert availability into adoption', 'Enable community-level operators'],
                        ],
                        [
                            'name' => 'LCNG refuelling stations',
                            'category' => 'penetration',
                            'category_label' => 'Penetration',
                            'coverage' => 'Highway & urban',
                            'capacity' => 'Refuelling grade',
                            'detail' => 'LCNG stations place compressed gas refuelling directly on high-traffic corridors so transport operators can convert fleets without range anxiety.',
                            'roles' => ['Support fleet conversion to CNG', 'Serve inter-city transport routes', 'Anchor commercial vehicle demand'],
                        ],
                        [
                            'name' => 'Modular dispensing systems',
                            'category' => 'penetration',
                            'category_label' => 'Penetration',
                            'coverage' => 'Site level',
                            'capacity' => 'Containerised',
                            'detail' => 'Containerised dispensing units can be positioned inside existing fuelling forecourts, industrial estates or estates under construction, with minimal civil work.',
                            'roles' => ['Add gas supply with minimal capex', 'Use existing forecourt footprint', 'Deploy at market speed'],
                        ],
                        [
                            'name' => 'Fleet technology & tracking',
                            'category' => 'technology',
                            'category_label' => 'Technology',
                            'coverage' => 'Every asset',
                            'capacity' => 'Live monitoring',
                            'detail' => 'Every trailer and station reports into a central operations view covering route progress, delivery confirmation, asset readiness and utilisation — the data layer the GASCORP App exposes to partners.',
                            'roles' => ['Live trip visibility', 'Utilisation and readiness reporting', 'Proof-of-delivery evidence'],
                        ],
                    ];
                @endphp

                <livewire:site.asset-explorer :assets="$assets" />
            </div>
        </div>
    </section>

    {{-- ================================================================
         Scale-out pathway
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="assets-scale">
        <div class="shell">
            <div class="split split-wide-right">
                <div>
                    <p class="eyebrow">Scale-out pathway</p>
                    <h2 id="assets-scale" class="display display-lg mt-6">Capacity that grows with the corridor.</h2>

                    <p class="lede mt-7">
                        Our asset plan is deliberately staged. Storage anchors the corridor, haulage extends its reach,
                        and penetration infrastructure converts that reach into consumption.
                    </p>

                    <div class="mt-10">
                        @foreach ([
                            ['Stage 01', 'Anchor', 'Commission strategic storage and the first wave of high-pressure trailers to serve established demand centres.'],
                            ['Stage 02', 'Extend', 'Widen the haulage fleet toward 300+ units and open local hubs in secondary cities.'],
                            ['Stage 03', 'Penetrate', 'Roll out skid plants, LCNG stations and modular dispensing systems across LGAs and into the ECOWAS corridor.'],
                        ] as $index => $stage)
                            <div class="row-num" @if ($index === 0) style="border-top:0" @endif>
                                <span class="row-num-index">{{ $stage[0] }}</span>
                                <h3 class="heading text-[1.05rem]">{{ $stage[1] }}</h3>
                                <p class="text-[0.9375rem] leading-7 text-[#475069]">{{ $stage[2] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative">
                    <figure class="media-frame aspect-[4/5]">
                        <img
                            src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1400&q=80"
                            alt="Gas haulage fleet staged at a depot"
                            loading="lazy"
                        >
                    </figure>
                    <div class="hatch absolute -top-6 -right-6 hidden h-28 w-28 lg:block" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         Safety & assurance
         ================================================================ --}}
    <section class="section surface-ink relative overflow-hidden" aria-labelledby="assets-safety">
        <div class="grid-lines absolute inset-0"></div>

        <div class="shell relative grid gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-5">
                <p class="eyebrow eyebrow-light">Assurance</p>
                <h2 id="assets-safety" class="display display-lg mt-6 text-white">
                    Safety is the licence to operate.
                </h2>
                <p class="lede mt-7 text-white/70">
                    Gas infrastructure only earns its place in a community if it is operated to a standard that
                    community can trust. That standard governs how our assets are specified, maintained and driven.
                </p>
            </div>

            <div class="lg:col-span-7">
                <div class="grid gap-px overflow-hidden border border-white/12 bg-white/12 sm:grid-cols-2">
                    @foreach ([
                        ['Specification discipline', 'Equipment is specified for the route, the payload and the receiving site — never generically.'],
                        ['Maintenance regime', 'Planned maintenance windows are scheduled against asset readiness, not reactive downtime.'],
                        ['Driver competency', 'Hazmat-certified drivers with route-specific training and fatigue management.'],
                        ['Incident readiness', 'Documented response procedures, drills and site-level emergency planning.'],
                    ] as $item)
                        <div class="bg-[#0f172a] p-7">
                            <h3 class="heading text-base text-white">{{ $item[0] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-white/60">{{ $item[1] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10 flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-gold" wire:navigate>
                        Discuss asset partnerships
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </a>
                    <a href="{{ route('services') }}#fleet" class="btn btn-outline-light" wire:navigate>Fleet management services</a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection