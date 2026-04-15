@extends('layouts.theme')
@section('title', 'About Us')
@section('meta_title', 'About GASCORP Nigeria')
@section('meta_description', 'Learn how GASCORP Nigeria is expanding access to cleaner energy through scalable gas infrastructure, logistics systems, and regional distribution strategy.')
@section('meta_keywords', 'about GASCORP, gas company Nigeria, clean energy access, LPG CNG LNG infrastructure')
@section('canonical', route('about'))
@section('og_image', 'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=2000&q=80')
@section('theme_color', '#0F2B5E')

@push('structured_data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'AboutPage',
            'name' => 'About GASCORP Nigeria',
            'description' => 'GASCORP Nigeria develops gas logistics and infrastructure systems that broaden cleaner energy access.',
            'url' => route('about'),
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => 'GASCORP Nigeria',
                'url' => url('/'),
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')
<main role="main" class="bg-[#F9FAFB] text-gray-900">

    <!-- PAGE HERO -->
    <section class="relative overflow-hidden min-h-[55vh] flex items-center bg-[url('https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=2000&q=80')] bg-cover bg-center">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0F172A]/85 via-[#1E3A8A]/70 to-[#0D9488]/45"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12 lg:px-20 py-20 w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-2 rounded-full bg-[#F59E0B]/90 text-white text-sm font-semibold tracking-wide shadow-md mb-5">
                    About GASCORP
                </span>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight text-white leading-tight">
                    Building Access to
                    <span class="block text-[#F59E0B]">Cleaner Energy</span>
                </h1>

                <p class="mt-6 text-lg md:text-xl text-white/90 leading-relaxed max-w-2xl">
                    GASCORP is creating the infrastructure, logistics systems, and delivery networks that make clean energy more accessible across Nigeria and West Africa.
                </p>
            </div>
        </div>
    </section>

    <!-- INTRO -->
    <section class="py-20 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            
            <div>
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                    Who We Are
                </span>

                <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-gray-900 mt-4 leading-tight">
                    A Purpose-Built Gas Infrastructure and Logistics Company
                </h2>

                <p class="mt-6 text-lg md:text-xl text-gray-600 leading-relaxed">
                    GASCORP (Gas Corridor and Penetration Ltd) is a purpose-built energy infrastructure and logistics company designed to solve one of the biggest challenges in Africa’s energy sector — access.
                </p>

                <p class="mt-4 text-lg md:text-xl text-gray-600 leading-relaxed">
                    While gas resources are abundant, accessibility remains limited. GASCORP bridges this gap by integrating storage, transportation, and penetration infrastructure into one unified system that expands access for households, businesses, industries, and underserved communities.
                </p>
            </div>

            <div class="relative">
                <img 
                    src="https://www.bakerhughes.com/sites/bakerhughes/files/styles/small_2_1_768x380_/public/2024-11/shutterstock_63056098.jpg?h=b80a9625&itok=_Nz8SHJG"
                    alt="GASCORP infrastructure"
                    class="relative w-full rounded-lg shadow-2xl object-cover"
                >
            </div>
        </div>
    </section>

    <!-- VISION + MISSION -->
    <section class="pb-20 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <div class="bg-white border border-gray-100 rounded-lg shadow-lg p-8 md:p-10">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                    Our Vision
                </span>
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mt-4 tracking-tight">
                    A Smarter, Stronger Gas Corridor
                </h3>
                <p class="mt-5 text-lg text-gray-600 leading-relaxed">
                    To become the most reliable, scalable, and technology-driven gas corridor in Nigeria and West Africa — enabling widespread adoption of clean energy across all sectors.
                </p>
            </div>

            <div class="bg-gradient-to-br from-[#1E3A8A] to-[#0D9488] rounded-lg shadow-lg p-8 md:p-10 text-white">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                    Our Mission
                </span>
                <h3 class="text-2xl md:text-3xl font-bold mt-4 tracking-tight">
                    Delivering Energy Access at Scale
                </h3>

                <ul class="mt-5 space-y-4 text-white/90 text-lg leading-relaxed">
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B] mt-1">•</span>
                        <span>Deliver safe and efficient gas transportation</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B] mt-1">•</span>
                        <span>Expand gas penetration across urban and rural markets</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B] mt-1">•</span>
                        <span>Build infrastructure that supports long-term energy access</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F59E0B] mt-1">•</span>
                        <span>Enable industries and communities to transition to cleaner energy</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 774 MANDATE -->
    <section class="pb-20 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="rounded-lg bg-[#0F172A] overflow-hidden shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                
                <div class="p-10 md:p-14">
                    <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                        Our Strategy
                    </span>
                    <h3 class="text-3xl md:text-5xl font-bold text-white mt-4 tracking-tight leading-tight">
                        The 774 Mandate
                    </h3>
                    <p class="mt-6 text-lg md:text-xl text-white/80 leading-relaxed">
                        Our long-term goal is simple but transformative:
                    </p>
                    <p class="mt-3 text-2xl md:text-3xl font-semibold text-[#F59E0B] leading-snug">
                        Ensure gas availability in all 774 LGAs in Nigeria.
                    </p>
                </div>

                <div class="bg-white p-10 md:p-14">
                    <h4 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">
                        How We Achieve It
                    </h4>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="rounded-lg bg-[#F9FAFB] p-5 border border-gray-100">
                            <p class="text-gray-900 font-semibold">Establishing local distribution hubs</p>
                        </div>
                        <div class="rounded-lg bg-[#F9FAFB] p-5 border border-gray-100">
                            <p class="text-gray-900 font-semibold">Partnering with regional stakeholders</p>
                        </div>
                        <div class="rounded-lg bg-[#F9FAFB] p-5 border border-gray-100">
                            <p class="text-gray-900 font-semibold">Deploying modular gas infrastructure</p>
                        </div>
                        <div class="rounded-lg bg-[#F9FAFB] p-5 border border-gray-100">
                            <p class="text-gray-900 font-semibold">Enabling last-mile delivery systems</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- WHAT MAKES US DIFFERENT -->
    <section class="pb-20 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                What Makes Us Different
            </span>
            <h3 class="text-3xl md:text-5xl font-bold text-gray-900 mt-4 tracking-tight">
                Built for Access, Scale, and Accountability
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="bg-white rounded-lg p-8 shadow-lg border border-gray-100">
                <h4 class="text-2xl font-bold text-gray-900 tracking-tight">Integrated Approach</h4>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    We combine logistics, infrastructure, and technology into one ecosystem.
                </p>
            </div>

            <div class="bg-white rounded-lg p-8 shadow-lg border border-gray-100">
                <h4 class="text-2xl font-bold text-gray-900 tracking-tight">Penetration-Focused Model</h4>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    We don’t just transport gas — we expand access and open new markets.
                </p>
            </div>

            <div class="bg-white rounded-lg p-8 shadow-lg border border-gray-100">
                <h4 class="text-2xl font-bold text-gray-900 tracking-tight">Technology-Driven Operations</h4>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    Our tracking systems ensure transparency, efficiency, and accountability.
                </p>
            </div>

            <div class="bg-white rounded-lg p-8 shadow-lg border border-gray-100">
                <h4 class="text-2xl font-bold text-gray-900 tracking-tight">Scalable Infrastructure</h4>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    From 100 to 300+ specialized gas trailers, our growth is designed for national impact.
                </p>
            </div>
        </div>
    </section>

    <!-- IMPACT -->
    <section class="pb-24 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="rounded-lg bg-gradient-to-br from-[#1E3A8A] via-[#0F2B5E] to-[#0D9488] p-10 md:p-14 shadow-2xl">
            <div class="max-w-3xl">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                    Our Impact
                </span>
                <h3 class="text-3xl md:text-5xl font-bold text-white mt-4 tracking-tight leading-tight">
                    Creating Value Across the Gas Value Chain
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/10">
                    <p class="text-white text-lg font-semibold leading-relaxed">
                        Cleaner energy for households
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/10">
                    <p class="text-white text-lg font-semibold leading-relaxed">
                        Lower transportation costs through CNG
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/10">
                    <p class="text-white text-lg font-semibold leading-relaxed">
                        Reliable energy for industries
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/10">
                    <p class="text-white text-lg font-semibold leading-relaxed">
                        Job creation across the value chain
                    </p>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
