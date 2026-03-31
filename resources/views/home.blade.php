@extends('layouts.theme')
@section('title', 'Welcome')
@section('content')
    <main role="main">
        {{-- Complete Hero Slideshow with your slide --}}
        <section class="hero relative min-h-screen bg-[url('https://content.gestra.com/-/media/gestra/global/industries/masthead_oil_and_gas_gettyimages-1039704136-min.ashx?rev=b232f5f541024574aa37f52d3bb42dad&extension=jpg%2Cgif')] bg-cover bg-center flex items-center overflow-hidden">
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#0F172A]/85 via-[#1E3A8A]/65 to-[#0D9488]/40"></div>

    <!-- Content -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-20 py-20">
        <div class="w-full lg:w-[60%]">
            <span class="inline-block bg-[#F59E0B]/70 text-white text-sm md:text-base font-semibold px-4 py-2 rounded-full shadow-md mb-5">
                Clean Energy Infrastructure
            </span>

            <h1 class="tracking-tighter leading-tight text-4xl md:text-6xl lg:text-7xl font-bold text-white leading-tight">
                Powering Nigeria’s Clean Energy Future
                <span class="block text-[#F59E0B]">One Corridor at a Time</span>
            </h1>

            <p class="text-white/90 text-lg md:text-xl lg:text-2xl leading-relaxed mt-5 max-w-3xl">
                GASCORP is building the infrastructure, logistics, and last-mile systems that deliver LPG, CNG, and LNG to every corner of Nigeria and beyond.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mt-8">
                <a href="#" class="w-full sm:w-auto">
                    <button role="button" class="w-full bg-[#1E3A8A] hover:bg-[#0F2B5E] text-white font-semibold px-6 py-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.02]">
                        Explore Our Solutions
                    </button>
                </a>

                <a href="#" class="w-full sm:w-auto">
                    <button role="button" class="w-full bg-[#F59E0B] hover:bg-amber-500 text-white font-semibold px-6 py-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.02]">
                        Partner With Us
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="relative overflow-hidden bg-[#F9FAFB]">
    
    <!-- ABOUT SECTION -->
    <section class="about-section py-24 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- TEXT -->
            <div class="who-we-are">
                <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-widest">
                    About GASCORP
                </span>

                <h1 class="text-4xl md:text-6xl font-bold tracking-tight text-gray-900 mt-4 leading-tight">
                    Who We Are
                </h1>

                <p class="mt-6 text-lg md:text-xl text-gray-600 leading-relaxed">
                    GASCORP (Gas Corridor and Penetration Ltd) is an integrated energy infrastructure company driving
                    the widespread adoption of cleaner gas energy across Nigeria and West Africa.
                </p>

                <p class="mt-4 text-lg md:text-xl text-gray-600 leading-relaxed">
                    We are not just moving gas — we are building the systems that make gas accessible, affordable, and
                    reliable for households, businesses, and industries.
                </p>

                <!-- CTA -->
                <a href="#" class="inline-block mt-8">
                    <button role="button"
                        class="group flex items-center gap-3 bg-[#1E3A8A] hover:bg-[#0F2B5E] text-white font-semibold px-6 py-4 rounded-xl shadow-lg transition-all duration-300">
                        
                        Learn More

                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            fill="currentColor"
                            class="transition-transform duration-300 group-hover:translate-x-1"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </button>
                </a>
            </div>

            <!-- IMAGE -->
            <div class="relative">
                <div class="absolute -top-6 -left-6 w-full h-full bg-[#F59E0B]/20 rounded-2xl blur-xl"></div>
                
                <img src="https://www.bakerhughes.com/sites/bakerhughes/files/styles/small_2_1_768x380_/public/2024-11/shutterstock_63056098.jpg?h=b80a9625&itok=_Nz8SHJG"
                    class="relative w-full rounded-2xl shadow-2xl object-cover"
                    alt="Gascorp Nigeria"/>
            </div>

        </div>

        <!-- MISSION -->
        <div class="mission mt-28 text-center max-w-4xl mx-auto">
            
            <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-widest">
                Our Mission
            </span>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 tracking-tight">
                Driving Clean Energy Access at Scale
            </h2>

            <p class="mt-6 text-lg md:text-xl text-gray-600 leading-relaxed">
                To democratize access to clean energy by developing scalable gas infrastructure, logistics systems, 
                and last-mile delivery networks across all 774 Local Government Areas in Nigeria.
            </p>

        </div>

    </section>
</section>
        {{-- -Our Core Pillars --}}
        <section class="pillars p-10 md:p-20 my-20 bg-gray-900">
            <div class="header-wrapper">
                <h1 class="text-6xl text-center text-gray-100">Our Core Pillars</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 justify-center">
                    <div class="icon-class mt-10">
                        <div class="justify-center icon text-yellow-500">
                            <img src="{{ asset('gas-station-fuel-svgrepo-com.svg') }}" class="h-20"/>
                        </div>
                        <h2 class="text-gray-200 text-2xl leading-tight">Gas Storage Infrastructure</h2>
                        <p class="text-gray-300 my-2">We develop regional and local storage hubs that stabilize supply and ensure consistent availability of LPG, CNG, and LNG.</p>
                    </div>
                    <div class="icon-class mt-10">
                        <div class="justify-center icon text-yellow-500">
                            <img src="{{ asset('network-svgrepo-com.svg') }}" class="h-20"/>
                        </div>
                        <h2 class="text-gray-200 text-2xl">Advanced Logistics Network</h2>
                        <p class="text-gray-300 my-2">Through virtual pipelines and intermodal transport systems, we deliver gas beyond traditional pipeline limitations.</p>
                    </div>
                    <div class="icon-class mt-10">
                        <div class="justify-center icon text-yellow-500">
                            <img src="{{ asset('strategy-success-plan-2-svgrepo-com.svg') }}" class="w-20"/>
                        </div>
                        <h2 class="text-gray-200 text-2xl">774 LGA Penetration Strategy</h2>
                        <p class="text-gray-300 my-2">We are deploying decentralized micro-distribution systems to ensure gas reaches rural and underserved communities.</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- -WHta we ddeliver --}}
        <section class="relative overflow-hidden bg-[#F9FAFB]">
    
    <section class="wwd-section py-24 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
    
    <!-- Heading -->
    <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-widest">
            What We Deliver
        </span>
        <h1 class="text-4xl md:text-6xl font-bold tracking-tight text-gray-900 mt-4 leading-tight">
            Energy Solutions Built for Access, Growth, and Reliability
        </h1>
        <p class="mt-6 text-lg md:text-xl text-gray-600 leading-relaxed">
            From household cooking to industrial power and transport systems, GASCORP delivers practical gas solutions backed by infrastructure and logistics excellence.
        </p>
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Card 1 -->
        <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
            <div class="overflow-hidden">
                <img src="https://pumaenergy.com/wp-content/uploads/2023/07/RS44410_10-2-scr.jpg.webp"
                     alt="Reliable LPG for clean cooking"
                     class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">
                    Reliable LPG for Clean Cooking
                </h2>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    Expanding access to cleaner household energy solutions that reduce dependence on firewood and charcoal while improving convenience and safety.
                </p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
            <div class="overflow-hidden">
                <img src="https://images.hindustantimes.com/auto/img/2021/07/01/600x338/CNG_Boot_Space_1579603511215_1625111599636.jpg"
                     alt="Affordable CNG for transportation"
                     class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">
                    Affordable CNG for Transportation
                </h2>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    Supporting cleaner and more cost-efficient mobility through dependable CNG distribution networks and refueling access points.
                </p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
            <div class="overflow-hidden">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Methanier_aspher_LNGRIVERS.jpg"
                     alt="Scalable LNG solutions for industries"
                     class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">
                    Scalable LNG Solutions for Industries
                </h2>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    Delivering LNG solutions for industrial users, off-grid applications, and energy-intensive operations that require reliable fuel supply.
                </p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
            <div class="overflow-hidden">
                <img src="https://www.woodwayenergy.com/wp-content/uploads/2023/11/How-Is-Natural-Gas-Transported.jpg"
                     alt="End-to-end gas logistics and infrastructure"
                     class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">
                    End-to-End Gas Logistics and Infrastructure
                </h2>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    Combining storage, transport, virtual pipeline systems, and penetration infrastructure to ensure gas reaches the markets that need it most.
                </p>
            </div>
        </div>

    </div>
</section>
<section class="relative py-16 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
    
    <!-- Vision Block -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#0F172A] via-[#1E3A8A] to-[#0D9488] px-8 py-16 md:px-14 md:py-20 shadow-2xl">
        
        <!-- Decorative glow -->
        <div class="absolute -top-16 -right-16 w-64 h-64 bg-[#F59E0B]/20 blur-3xl rounded-full"></div>
        <div class="absolute -bottom-20 -left-10 w-72 h-72 bg-cyan-400/10 blur-3xl rounded-full"></div>

        <div class="relative z-10 max-w-4xl">
            <span class="inline-block text-sm font-semibold uppercase tracking-[0.2em] text-[#F59E0B] mb-4">
                Regional Expansion
            </span>

            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight leading-tight mb-6">
                Vision for West Africa
            </h1>

            <p class="text-lg md:text-2xl text-white/85 leading-relaxed max-w-3xl">
                We are building a regional gas corridor that connects supply to demand, powering industrial growth from Nigeria to the wider ECOWAS region through smarter infrastructure, logistics, and energy access systems.
            </p>
        </div>
    </div>

    <!-- CTA Block -->
    <div class="cta mt-12 rounded-3xl bg-[#F9FAFB] border border-gray-200 py-16 md:py-20 px-6 md:px-10 text-center shadow-sm">
        <div class="max-w-4xl mx-auto">
            <span class="inline-block text-sm font-semibold uppercase tracking-[0.2em] text-[#F59E0B] mb-4">
                Let’s Build the Future
            </span>

            <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-gray-900 leading-tight max-w-3xl mx-auto mb-6">
                Ready to be part of Nigeria’s energy transition?
            </h2>

            <p class="text-lg md:text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto mb-8">
                Partner with GASCORP to expand clean energy access, strengthen gas infrastructure, and power long-term growth across Nigeria and West Africa.
            </p>

            <a href="#contact" class="inline-flex items-center gap-3 bg-[#F59E0B] hover:bg-amber-500 text-white font-semibold px-8 py-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.02]">
                Partner with GASCORP Today
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>
        </div>
    </div>

</section>
    </main>
@endsection