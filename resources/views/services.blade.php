@extends('layouts.theme')
@section('title', 'Our Services')
@section('meta_title', 'Gas Services: LPG, CNG, LNG Logistics')
@section('meta_description', 'Explore GASCORP Nigeria services across gas storage, transportation, penetration infrastructure, and advisory for LPG, CNG, and LNG projects.')
@section('meta_keywords', 'gas services Nigeria, LPG storage, CNG transportation, LNG logistics, gas advisory')
@section('canonical', route('services'))
@section('og_image', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2000&q=80')
@section('theme_color', '#12335F')

@push('structured_data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Integrated Gas Infrastructure and Logistics Services',
            'provider' => [
                '@type' => 'Organization',
                'name' => 'Gas Corridor and Penetration Ltd',
                'url' => url('/'),
            ],
            'areaServed' => 'Nigeria and West Africa',
            'url' => route('services'),
            'description' => 'Storage, transport, penetration infrastructure, and operational advisory for LPG, CNG, and LNG systems.',
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')
<main role="main" class="bg-[#F9FAFB] text-gray-900">

    <!-- PAGE HERO -->
    <section class="relative overflow-hidden min-h-[55vh] flex items-center bg-[url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=2000&q=80')] bg-cover bg-center">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0F172A]/85 via-[#1E3A8A]/70 to-[#0D9488]/45"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12 lg:px-20 py-20 w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-2 rounded-full bg-[#F59E0B]/90 text-white text-sm font-semibold tracking-wide shadow-md mb-5">
                    Our Services
                </span>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight text-white leading-tight">
                    Infrastructure, Logistics, and
                    <span class="block text-[#F59E0B]">Energy Access Solutions</span>
                </h1>

                <p class="mt-6 text-lg md:text-xl text-white/90 leading-relaxed max-w-2xl">
                    GASCORP delivers integrated gas solutions that expand access, strengthen supply, and support cleaner energy adoption across Nigeria and West Africa.
                </p>
            </div>
        </div>
    </section>

    <!-- INTRO -->
    <section class="py-20 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto">
            <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                What We Do
            </span>
            <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-gray-900 mt-4">
                End-to-End Gas Services Built for Scale
            </h2>
            <p class="mt-6 text-lg md:text-xl text-gray-600 leading-relaxed">
                From storage and transport to market penetration and advisory, our services are designed to make LPG, CNG, and LNG more accessible, reliable, and commercially viable.
            </p>
        </div>
    </section>

    <!-- SERVICES GRID -->
    <section class="pb-20 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- 1 -->
            <div class="bg-white rounded-lg p-8 md:p-10 shadow-lg border border-gray-100">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">01</span>
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mt-4 tracking-tight">
                    Gas Storage Solutions
                </h3>
                <p class="mt-5 text-lg text-gray-600 leading-relaxed">
                    We develop and manage strategic storage facilities that ensure uninterrupted supply of LPG, CNG, and LNG across regions.
                </p>

                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-gray-900">Key Benefits</h4>
                    <ul class="mt-4 space-y-3 text-gray-600">
                        <li class="flex items-start gap-3">
                            <span class="text-[#F59E0B]">•</span>
                            <span>Supply stability</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#F59E0B]">•</span>
                            <span>Reduced volatility</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#F59E0B]">•</span>
                            <span>Strategic reserves for demand peaks</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 2 -->
            <div class="bg-gradient-to-br from-[#1E3A8A] to-[#0D9488] rounded-lg p-8 md:p-10 shadow-lg text-white">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">02</span>
                <h3 class="text-2xl md:text-3xl font-bold mt-4 tracking-tight">
                    Gas Logistics & Transportation
                </h3>

                <div class="mt-6 space-y-6 text-white/90">
                    <div>
                        <h4 class="text-lg font-semibold text-white">Virtual Pipeline Systems</h4>
                        <p class="mt-2 leading-relaxed">
                            We transport gas using specialized high-pressure and cryogenic trailers to areas without pipeline access.
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-white">Intermodal Logistics</h4>
                        <p class="mt-2 leading-relaxed">
                            We integrate road and maritime systems to enable cross-border gas distribution.
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-white">Capabilities</h4>
                        <ul class="mt-3 space-y-3">
                            <li class="flex items-start gap-3">
                                <span class="text-[#F59E0B]">•</span>
                                <span>Bulk LPG haulage</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-[#F59E0B]">•</span>
                                <span>CNG distribution networks</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-[#F59E0B]">•</span>
                                <span>LNG cryogenic transport</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 3 -->
            <div class="bg-white rounded-lg p-8 md:p-10 shadow-lg border border-gray-100">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">03</span>
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mt-4 tracking-tight">
                    Gas Penetration Infrastructure
                </h3>
                <p class="mt-5 text-lg text-gray-600 leading-relaxed">
                    We deploy infrastructure that enables real access to gas where it is needed — not just where pipelines exist.
                </p>

                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 font-medium text-gray-900">LPG skid plants</div>
                    <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 font-medium text-gray-900">LCNG stations</div>
                    <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 font-medium text-gray-900">Mini distribution hubs</div>
                    <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 font-medium text-gray-900">Modular dispensing systems</div>
                </div>
            </div>

            <!-- 4 -->
            <div class="bg-white rounded-lg p-8 md:p-10 shadow-lg border border-gray-100">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">04</span>
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mt-4 tracking-tight">
                    774 LGA Distribution Model
                </h3>
                <p class="mt-5 text-lg text-gray-600 leading-relaxed">
                    Our decentralized distribution system is designed to expand cleaner energy access across urban, rural, and underserved communities.
                </p>

                <ul class="mt-8 space-y-4 text-gray-600">
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B]">•</span>
                        <span>Replace firewood and charcoal with LPG</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B]">•</span>
                        <span>Support local businesses with affordable energy</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B]">•</span>
                        <span>Establish CNG refueling points</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B]">•</span>
                        <span>Enable off-grid LNG power solutions</span>
                    </li>
                </ul>
            </div>

            <!-- 5 -->
            <div class="bg-gradient-to-br from-[#0F172A] to-[#1E3A8A] rounded-lg p-8 md:p-10 shadow-lg text-white">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">05</span>
                <h3 class="text-2xl md:text-3xl font-bold mt-4 tracking-tight">
                    Fleet & Logistics Management
                </h3>
                <p class="mt-5 text-lg text-white/85 leading-relaxed">
                    We operate and manage a growing fleet of specialized gas trailers, with support for third-party integration.
                </p>

                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-white">Services Include</h4>
                    <ul class="mt-4 space-y-3 text-white/85">
                        <li class="flex items-start gap-3">
                            <span class="text-[#F59E0B]">•</span>
                            <span>Dispatch coordination</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#F59E0B]">•</span>
                            <span>Route monitoring</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#F59E0B]">•</span>
                            <span>Delivery tracking</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#F59E0B]">•</span>
                            <span>Fleet optimization</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 6 -->
            <div class="bg-white rounded-lg p-8 md:p-10 shadow-lg border border-gray-100">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">06</span>
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mt-4 tracking-tight">
                    Infrastructure & Logistics Advisory
                </h3>
                <p class="mt-5 text-lg text-gray-600 leading-relaxed">
                    We support partners with the systems, planning, and operational frameworks needed to expand gas access efficiently.
                </p>

                <ul class="mt-8 space-y-4 text-gray-600">
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B]">•</span>
                        <span>Gas logistics system design</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B]">•</span>
                        <span>Infrastructure deployment planning</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B]">•</span>
                        <span>Market penetration strategies</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B]">•</span>
                        <span>Operational coordination</span>
                    </li>
                </ul>
            </div>

        </div>
    </section>

    <!-- INDUSTRIES -->
    <section class="pb-20 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="rounded-lg bg-white border border-gray-100 shadow-lg p-8 md:p-12">
            <div class="max-w-3xl">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                    Industries We Serve
                </span>
                <h3 class="text-3xl md:text-5xl font-bold text-gray-900 mt-4 tracking-tight">
                    Serving Diverse Energy and Commercial Needs
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-10">
                <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 text-center font-semibold text-gray-900">
                    Energy companies
                </div>
                <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 text-center font-semibold text-gray-900">
                    Industrial manufacturers
                </div>
                <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 text-center font-semibold text-gray-900">
                    Transport operators
                </div>
                <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 text-center font-semibold text-gray-900">
                    Government projects
                </div>
                <div class="rounded-lg bg-[#F9FAFB] border border-gray-100 p-5 text-center font-semibold text-gray-900">
                    Commercial and residential markets
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="pb-24 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="rounded-lg bg-gradient-to-br from-[#1E3A8A] via-[#0F2B5E] to-[#0D9488] p-10 md:p-14 shadow-2xl text-center">
            <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                Let’s Build Together
            </span>

            <h3 class="text-3xl md:text-5xl font-bold text-white mt-4 tracking-tight leading-tight max-w-3xl mx-auto">
                Need reliable gas infrastructure or logistics support?
            </h3>

            <p class="mt-6 text-lg md:text-xl text-white/85 leading-relaxed max-w-2xl mx-auto">
                Let’s build your energy solution together with infrastructure, logistics, and delivery systems designed for long-term impact.
            </p>

            <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 mt-8 bg-[#F59E0B] hover:bg-amber-500 text-white font-semibold px-8 py-4 rounded-lg shadow-lg transition-all duration-300 hover:scale-[1.02]">
                Let’s Build Your Energy Solution
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>
        </div>
    </section>

</main>
@endsection
