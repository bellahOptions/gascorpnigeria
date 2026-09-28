@extends('layouts.theme')
@section('title', 'About Us')
@section('meta_title', 'About GASCORP Nigeria | Gas Infrastructure Company')
@section('meta_description', 'Learn how GASCORP Nigeria is expanding access to cleaner energy through scalable gas infrastructure, logistics systems and a national distribution strategy.')
@section('meta_keywords', 'about GASCORP, gas company Nigeria, clean energy access, LPG CNG LNG infrastructure, 774 LGA')
@section('canonical', route('about'))
@section('og_image', 'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=2000&q=80')
@section('theme_color', '#0F2B5E')

@push('structured_data')
    <script type="application/ld+json">
                {{-- Schema.org keys are written without their "@" prefix and restored after
             encoding: Blade would otherwise compile "@context" as a directive. --}}
{!! strtr(json_encode([
            'context' => 'https://schema.org',
            'type' => 'AboutPage',
            'name' => 'About GASCORP Nigeria',
            'description' => 'GASCORP Nigeria develops gas logistics and infrastructure systems that broaden cleaner energy access.',
            'url' => route('about'),
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
        eyebrow="Who we are"
        title="Building access to"
        accent="cleaner energy."
        description="GASCORP is creating the infrastructure, logistics systems and delivery networks that make clean energy more accessible across Nigeria and West Africa."
        :image="'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=2200&q=80'"
        breadcrumb="About"
    />

    {{-- ================================================================
         Company narrative
         ================================================================ --}}
    <section class="section" aria-labelledby="about-narrative">
        <div class="shell">
            <div class="split split-wide-right">
                <div>
                    <p class="eyebrow">The company</p>
                    <h2 id="about-narrative" class="display display-lg mt-6">
                        A purpose-built gas infrastructure and logistics company.
                    </h2>

                    <div class="prose-gas mt-7 max-w-xl">
                        <p>
                            <strong>GASCORP (Gas Corridor and Penetration Ltd)</strong> was designed to solve one of the
                            biggest challenges in Africa's energy sector — access.
                        </p>
                        <p>
                            Gas resources in Nigeria are abundant. What has been missing is the connective tissue between
                            where gas is produced and where it is consumed. GASCORP bridges that gap by integrating
                            storage, transportation and penetration infrastructure into one unified system.
                        </p>
                        <p>
                            That system expands access for households, businesses, industries and underserved communities
                            — and it is engineered to keep working as demand grows.
                        </p>
                    </div>

                    <dl class="mt-10 grid grid-cols-1 gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] sm:grid-cols-2">
                        @foreach ([
                            ['Registered name', 'Gas Corridor and Penetration Ltd'],
                            ['Operating base', 'Ikoyi, Lagos State, Nigeria'],
                            ['Value streams', 'LPG, CNG and LNG'],
                            ['Coverage ambition', 'All 774 LGAs, then ECOWAS'],
                        ] as $fact)
                            <div class="bg-white p-5">
                                <dt class="label text-[#475069]">{{ $fact[0] }}</dt>
                                <dd class="mt-2 font-[Manrope] text-[0.9375rem] font-bold text-[#0f172a]">{{ $fact[1] }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>

                <div class="relative">
                    <figure class="media-frame aspect-[4/5]">
                        <img
                            src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=1400&q=80"
                            alt="GASCORP engineers reviewing gas infrastructure plans"
                            loading="lazy"
                        >
                    </figure>
                    <div class="hatch absolute -bottom-6 -right-6 hidden h-28 w-28 lg:block" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         Vision + Mission
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="about-vision">
        <div class="shell grid gap-8 lg:grid-cols-12">
            <div class="lg:col-span-6">
                <div class="flex h-full flex-col border border-[#e6e9ee] bg-white p-8 md:p-10">
                    <p class="eyebrow">Our vision</p>
                    <h2 id="about-vision" class="heading heading-md mt-5">A smarter, stronger gas corridor.</h2>
                    <p class="lede mt-5 text-base">
                        To become the most reliable, scalable and technology-driven gas corridor in Nigeria and
                        West Africa — enabling widespread adoption of clean energy across every sector of the economy.
                    </p>

                    <div class="mt-auto pt-9">
                        <div class="h-px w-full bg-[#e6e9ee]"></div>
                        <p class="mt-6 font-[DM_Mono,monospace] text-[0.6875rem] uppercase tracking-[0.18em] text-[#475069]">
                            Measured by markets opened, not loads moved
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="relative flex h-full flex-col overflow-hidden bg-[#1E3A8A] p-8 md:p-10">
                    <div class="grid-lines absolute inset-0"></div>

                    <div class="relative">
                        <p class="eyebrow eyebrow-light">Our mission</p>
                        <h2 class="heading heading-md mt-5 text-white">Delivering energy access at scale.</h2>

                        <ul class="mt-8 space-y-5">
                            @foreach ([
                                'Deliver safe and efficient gas transportation across the corridor',
                                'Expand gas penetration across urban, peri-urban and rural markets',
                                'Build infrastructure that supports long-term, dependable energy access',
                                'Enable industries and communities to transition to cleaner energy',
                            ] as $item)
                                <li class="flex items-start gap-3.5">
                                    <span class="mt-0.5 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#F59E0B] text-white">
                                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7" />
                                        </svg>
                                    </span>
                                    <span class="text-[0.9375rem] leading-7 text-white/85">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         774 Mandate
         ================================================================ --}}
    <section class="section" aria-labelledby="about-774">
        <div class="shell">
            <div class="overflow-hidden border border-[#e6e9ee]">
                <div class="grid lg:grid-cols-2">
                    <div class="relative overflow-hidden bg-[#0f172a] p-9 md:p-14">
                        <div class="grid-lines absolute inset-0"></div>

                        <div class="relative">
                            <p class="eyebrow eyebrow-light">Our strategy</p>
                            <h2 id="about-774" class="display display-lg mt-6 text-white">The 774 mandate.</h2>

                            <p class="lede mt-7 text-white/70">
                                Our long-term goal is simple but transformative.
                            </p>

                            <p class="display display-sm mt-5 text-[#F59E0B]">
                                Ensure gas availability in all 774 Local Government Areas in Nigeria.
                            </p>

                            <div class="mt-10 grid grid-cols-3 gap-6 border-t border-white/12 pt-8">
                                <div>
                                    <p class="stat-figure stat-figure-light text-4xl">774</p>
                                    <p class="stat-label text-white/45">LGAs targeted</p>
                                </div>
                                <div>
                                    <p class="stat-figure stat-figure-light text-4xl">36</p>
                                    <p class="stat-label text-white/45">States + FCT</p>
                                </div>
                                <div>
                                    <p class="stat-figure stat-figure-light text-4xl">6</p>
                                    <p class="stat-label text-white/45">Geopolitical zones</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-9 md:p-14">
                        <h3 class="heading heading-md">How we achieve it.</h3>

                        <div class="mt-9 space-y-6">
                            @foreach ([
                                ['Establishing local distribution hubs', 'A regional depot feeding a constellation of micro-distribution points close to demand.'],
                                ['Partnering with regional stakeholders', 'State governments, cooperatives and private operators aligned behind supply commitments.'],
                                ['Deploying modular gas infrastructure', 'Skid-mounted plants and LPG/LCNG stations that can be installed at market speed.'],
                                ['Enabling last-mile delivery systems', 'Cylinder exchange, bulk haulage and dispatch networks that carry gas the final distance.'],
                            ] as $index => $item)
                                <div class="flex gap-5 border-t border-[#e6e9ee] pt-5" @if ($index === 0) style="border-top:0;padding-top:0" @endif>
                                    <span class="mono-num shrink-0 pt-0.5 text-xs tracking-[0.16em] text-[#F59E0B]">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <div>
                                        <p class="font-[Manrope] text-[0.975rem] font-bold text-[#0f172a]">{{ $item[0] }}</p>
                                        <p class="mt-1.5 text-[0.9375rem] leading-7 text-[#475069]">{{ $item[1] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         Differentiation
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="about-different">
        <div class="shell">
            <div class="max-w-3xl">
                <p class="eyebrow">What makes us different</p>
                <h2 id="about-different" class="display display-lg mt-6">Built for access, scale and accountability.</h2>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] md:grid-cols-2">
                @foreach ([
                    ['Integrated approach', 'We combine logistics, infrastructure and technology into one operating ecosystem rather than selling disconnected services.'],
                    ['Penetration-focused model', 'We do not just transport gas — we open markets and build the local demand that sustains them.'],
                    ['Technology-driven operations', 'Tracking, dispatch and reporting systems deliver transparency, efficiency and accountability on every load.'],
                    ['Scalable infrastructure', 'From 100 to 300+ specialised gas trailers, our growth model is designed for national impact without losing control.'],
                ] as $index => $item)
                    <livewire:site.reveal :index="$index" :stagger="true" :key="'diff-'.$index" class="bg-white">
                        <article class="flex h-full flex-col p-8 md:p-10">
                            <span class="card-index">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h3 class="heading heading-sm mt-4">{{ $item[0] }}</h3>
                            <p class="mt-3 text-[0.9375rem] leading-7 text-[#475069]">{{ $item[1] }}</p>
                        </article>
                    </livewire:site.reveal>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================================================================
         Impact
         ================================================================ --}}
    <section class="section surface-ink relative overflow-hidden" id="impact" aria-labelledby="about-impact">
        <div class="grid-lines absolute inset-0"></div>

        <div class="shell relative">
            <div class="grid gap-10 lg:grid-cols-12 lg:items-end">
                <div class="lg:col-span-7">
                    <p class="eyebrow eyebrow-light">Our impact</p>
                    <h2 id="about-impact" class="display display-lg mt-6 text-white">
                        Creating value across the gas value chain.
                    </h2>
                </div>
                <div class="lg:col-span-5">
                    <p class="text-[1.0625rem] leading-8 text-white/65">
                        Every corridor we open compounds: cheaper cooking fuel, cheaper transport, more reliable
                        industrial power and more jobs along the way.
                    </p>
                </div>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-px overflow-hidden border border-white/12 bg-white/12 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['Households', 'Cleaner, safer cooking energy that displaces firewood and charcoal.'],
                    ['Transport', 'Lower fuel cost per kilometre for commercial and passenger operators.'],
                    ['Industry', 'Reliable gas supply for manufacturing and off-grid power generation.'],
                    ['Employment', 'Skilled jobs across storage, haulage, distribution and technology.'],
                ] as $item)
                    <div class="bg-[#0f172a] p-7">
                        <p class="stat-figure stat-figure-gold text-2xl">{{ $item[0] }}</p>
                        <p class="mt-4 text-sm leading-7 text-white/60">{{ $item[1] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-14 flex flex-wrap gap-3">
                <a href="{{ route('assets') }}" class="btn btn-gold" wire:navigate>
                    See the asset base
                    <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light" wire:navigate>Talk to our team</a>
            </div>
        </div>
    </section>

</main>
@endsection