<header class="p-5 border-b-2 border-blue-100 bg-white shadow-sm">
        <nav class="px-4 md:px-10 lg:px-20 hidden md:flex items-center justify-between">
            <div class="logo">
                <img src="{{ asset('1.svg') }}" class="h-12" alt="GASCORP Logo"/>
            </div>
            <div class="links space-x-6 text-gray-700 font-medium">
                <a href="#" class="hover:text-[#F59E0B] transition-colors">Home</a>
                <a href="#" class="hover:text-[#F59E0B] transition-colors">About Us</a>
                <a href="#" class="hover:text-[#F59E0B] transition-colors">Our Services</a>
                <a href="#" class="hover:text-[#F59E0B] transition-colors">Blog</a>
            </div>
            <div class="buttons">
                <a href="#"><button role="button" class="bg-[#1E3A8A] p-3 px-6 rounded-lg text-white font-semibold hover:bg-[#F59E0B] transition-all duration-300 shadow-md hover:shadow-lg">Contact Us</button></a>
            </div>        
        </nav>
        {{-- Mobile Menu Toggle --}}
        <div class="mobile-menu-toggle flex justify-between items-center md:hidden">
            <div class="logo">
                <img src="{{ asset('1.svg') }}" class="h-10" alt="GASCORP Logo"/>
            </div>
            <div class="menu-toggle cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-[#1E3A8A]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </div>
        </div>
        {{-- Mobile Nav --}}
        <div class="mobile hidden flex-col space-y-5 mt-6 md:hidden bg-white p-5 rounded-lg shadow-lg">
            <a href="#" class="p-2 block text-gray-700 hover:text-[#F59E0B]">Home</a>
            <a href="#" class="p-2 block text-gray-700 hover:text-[#F59E0B]">About Us</a>
            <a href="#" class="p-2 block text-gray-700 hover:text-[#F59E0B]">Our Services</a>
            <a href="#" class="p-2 block text-gray-700 hover:text-[#F59E0B]">Blog</a>
            <div class="buttons pt-2">
                <a href="#"><button role="button" class="bg-[#1E3A8A] p-3 rounded-lg text-white w-full">Contact Us</button></a>
            </div>   
        </div>
    </header>
