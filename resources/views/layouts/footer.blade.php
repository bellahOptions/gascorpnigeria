<footer class="border-t border-gray-200 bg-[#111815] text-gray-300" role="contentinfo">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-5 py-14 md:grid-cols-2 md:px-10 lg:grid-cols-4 lg:px-16">
        <div class="lg:col-span-2">
            <img src="{{ asset('2.png') }}" class="h-11 w-auto" alt="GASCORP Nigeria">
            <p class="mt-5 max-w-xl text-sm leading-7 text-gray-400">
                Gas Corridor and Penetration Ltd develops the infrastructure, logistics, and last-mile systems that make LPG, CNG, and LNG more accessible across Nigeria and West Africa.
            </p>
            <div class="mt-7 grid max-w-xl grid-cols-1 gap-3 text-sm sm:grid-cols-2">
                <div class="border-l-2 border-[#D99A1E] pl-4">
                    <p class="font-bold text-white">Head Office</p>
                    <p class="mt-1 text-gray-400">Ocean Parade Towers, Banana Island, Ikoyi, Lagos</p>
                </div>
                <div class="border-l-2 border-[#D99A1E] pl-4">
                    <p class="font-bold text-white">Contact</p>
                    <a href="tel:07038392520" class="mt-1 block text-gray-400 hover:text-white">07038392520</a>
                    <a href="mailto:info@gascorpnigeria.com" class="mt-1 block text-gray-400 hover:text-white">info@gascorpnigeria.com</a>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-sm font-bold uppercase tracking-widest text-[#D99A1E]">Company</h2>
            <div class="mt-5 space-y-3 text-sm">
                <a href="{{ route('about') }}" class="block hover:text-white">About GASCORP</a>
                <a href="{{ route('services') }}" class="block hover:text-white">Services</a>
                <a href="{{ route('contact') }}" class="block hover:text-white">Contact</a>
                <a href="{{ route('home') }}" class="block hover:text-white">Home</a>
                <a href="{{ route('app.landing') }}" class="block hover:text-white">GASCORP App</a>
            </div>
        </div>

        <div>
            <h2 class="text-sm font-bold uppercase tracking-widest text-[#D99A1E]">Capabilities</h2>
            <div class="mt-5 space-y-3 text-sm">
                <p>Gas storage infrastructure</p>
                <p>Virtual pipeline logistics</p>
                <p>LPG, CNG, and LNG distribution</p>
                <p>Energy access advisory</p>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10 px-5 py-5 text-center text-sm text-gray-500">
        Gas Corridor and Penetration Ltd &copy; {{ date('Y') }}. All rights reserved.
    </div>
</footer>
