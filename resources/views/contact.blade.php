@extends('layouts.theme')
@section('title', 'Contact Us')

@section('content')
<main role="main" class="bg-[#F9FAFB] text-gray-900">

    <!-- PAGE HERO -->
    <section class="relative overflow-hidden min-h-[50vh] flex items-center bg-[url('https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=2000&q=80')] bg-cover bg-center">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0F172A]/85 via-[#1E3A8A]/70 to-[#0D9488]/45"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12 lg:px-20 py-20 w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-2 rounded-full bg-[#F59E0B]/90 text-white text-sm font-semibold tracking-wide shadow-md mb-5">
                    Contact GASCORP
                </span>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight text-white leading-tight">
                    Let’s Talk About
                    <span class="block text-[#F59E0B]">Energy Access</span>
                </h1>

                <p class="mt-6 text-lg md:text-xl text-white/90 leading-relaxed max-w-2xl">
                    Reach out to our team for partnerships, infrastructure support, logistics solutions, and general enquiries.
                </p>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="py-20 px-6 md:px-12 lg:px-20 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            <!-- CONTACT INFO -->
            <div class="lg:col-span-2">
                <div class="rounded-3xl bg-gradient-to-br from-[#1E3A8A] via-[#0F2B5E] to-[#0D9488] p-8 md:p-10 shadow-2xl text-white h-full">
                    <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                        Get In Touch
                    </span>

                    <h2 class="text-3xl md:text-4xl font-bold mt-4 tracking-tight leading-tight">
                        Contact Information
                    </h2>

                    <p class="mt-5 text-white/85 text-lg leading-relaxed">
                        We’re ready to discuss your gas infrastructure, logistics, distribution, and partnership needs.
                    </p>

                    <div class="mt-10 space-y-8">

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F59E0B]" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 1 0 2 6c0 4.314 6 10 6 10m0-7.5A2.5 2.5 0 1 1 8 3a2.5 2.5 0 0 1 0 5"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold">Office Address</h3>
                                <p class="text-white/80 mt-1 leading-relaxed">
                                    Ocean Parade Towers,<br>
                                    1st Avenue, Banana Island,<br>
                                    Ikoyi, Lagos State
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F59E0B]" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 1 .737-.153l2.522 1.01c.329.132.547.45.547.805v1.95a.68.68 0 0 1-.273.542l-1.12.84a11.7 11.7 0 0 0 4.611 4.611l.84-1.12a.68.68 0 0 1 .542-.273h1.95c.355 0 .673.218.805.547l1.01 2.522a.678.678 0 0 1-.153.737l-1.272 1.272a1.75 1.75 0 0 1-1.58.47c-2.684-.566-5.11-1.907-7.16-3.957S1.362 6.266.796 3.58a1.75 1.75 0 0 1 .47-1.58z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold">Phone Number</h3>
                                <p class="text-white/80 mt-1">
                                    <a href="tel:07038392520" class="hover:text-white transition">07038392520</a>
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="mt-10 rounded-2xl bg-white/10 p-5 border border-white/10">
                        <p class="text-sm text-white/80 leading-relaxed">
                            For security, all submissions are protected with strict validation, anti-bot checks, and server-side verification.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FORM -->
            <div class="lg:col-span-3">
                <div class="rounded-3xl bg-white border border-gray-100 shadow-xl p-8 md:p-10">
                    <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">
                        Send a Message
                    </span>

                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-4 tracking-tight">
                        Secure Contact Form
                    </h2>

                    <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                        Fill in your details and our team will get back to you as soon as possible.
                    </p>

                    @if (session('success'))
                        <div class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
                            <ul class="space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="mt-8 space-y-6">
                        @csrf

                        <!-- Honeypot -->
                        <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-800 mb-2">Full Name</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    maxlength="120"
                                    required
                                    class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition"
                                    placeholder="Enter your full name"
                                >
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-800 mb-2">Email Address</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    maxlength="150"
                                    required
                                    class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition"
                                    placeholder="Enter your email address"
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-800 mb-2">Phone Number</label>
                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    maxlength="20"
                                    required
                                    class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition"
                                    placeholder="Enter your phone number"
                                >
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-800 mb-2">Subject</label>
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    maxlength="150"
                                    required
                                    class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition"
                                    placeholder="What is this about?"
                                >
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-800 mb-2">Message</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                maxlength="3000"
                                required
                                class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition resize-none"
                                placeholder="Tell us about your enquiry"
                            >{{ old('message') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3">Security Check</label>
                            <div class="rounded-2xl border border-gray-200 p-4 bg-[#F9FAFB]">
                                <div class="cf-turnstile"
                                     data-sitekey="{{ config('services.turnstile.site_key') }}"
                                     data-theme="light">
                                </div>
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="inline-flex items-center gap-3 bg-[#F59E0B] hover:bg-amber-500 text-white font-semibold px-8 py-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.02]"
                            >
                                Submit Enquiry
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>

<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
@endsection