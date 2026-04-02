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
                    Let's Talk About
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
                    <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">Get In Touch</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-4 tracking-tight leading-tight">Contact Information</h2>
                    <p class="mt-5 text-white/85 text-lg leading-relaxed">
                        We're ready to discuss your gas infrastructure, logistics, distribution, and partnership needs.
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
                    <span class="text-sm font-semibold text-[#F59E0B] uppercase tracking-[0.2em]">Send a Message</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-4 tracking-tight">Contact Us</h2>
                    <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                        Fill in your details and our team will get back to you as soon as possible.
                    </p>

                    @if (session('success'))
                        <div role="alert" class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div role="alert" class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
                            <p class="font-semibold mb-2">Please fix the following errors:</p>
                            <ul class="space-y-1 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 shrink-0"></span>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        id="contactForm"
                        action="{{ route('contact.submit') }}"
                        method="POST"
                        class="mt-8 space-y-6"
                        novalidate
                    >
                        @csrf

                        {{-- Honeypot: hidden from real users, bots fill it --}}
                        <input type="text" name="website" tabindex="-1" autocomplete="off"
                               aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;height:0;">

                        {{-- Timing token --}}
                        <input type="hidden" name="form_started_at" value="{{ now()->timestamp }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Full Name <span class="text-red-500" aria-hidden="true">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    maxlength="120"
                                    required
                                    autocomplete="name"
                                    aria-required="true"
                                    aria-describedby="name-error"
                                    class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition @error('name') border-red-400 @enderror"
                                    placeholder="Enter your full name"
                                >
                                <p id="name-error" class="mt-1.5 text-sm text-red-600 hidden" aria-live="polite"></p>
                                @error('name')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Email Address <span class="text-red-500" aria-hidden="true">*</span>
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    maxlength="150"
                                    required
                                    autocomplete="email"
                                    aria-required="true"
                                    aria-describedby="email-error"
                                    class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition @error('email') border-red-400 @enderror"
                                    placeholder="Enter your email address"
                                >
                                <p id="email-error" class="mt-1.5 text-sm text-red-600 hidden" aria-live="polite"></p>
                                @error('email')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Phone Number <span class="text-red-500" aria-hidden="true">*</span>
                                </label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    maxlength="20"
                                    required
                                    autocomplete="tel"
                                    aria-required="true"
                                    aria-describedby="phone-error"
                                    class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition @error('phone') border-red-400 @enderror"
                                    placeholder="e.g. +234 803 000 0000"
                                >
                                <p id="phone-error" class="mt-1.5 text-sm text-red-600 hidden" aria-live="polite"></p>
                                @error('phone')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Subject <span class="text-red-500" aria-hidden="true">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    maxlength="150"
                                    required
                                    aria-required="true"
                                    aria-describedby="subject-error"
                                    class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition @error('subject') border-red-400 @enderror"
                                    placeholder="What is this about?"
                                >
                                <p id="subject-error" class="mt-1.5 text-sm text-red-600 hidden" aria-live="polite"></p>
                                @error('subject')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-800 mb-2">
                                Message <span class="text-red-500" aria-hidden="true">*</span>
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                maxlength="3000"
                                required
                                aria-required="true"
                                aria-describedby="message-error message-count"
                                class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-4 text-gray-900 outline-none focus:border-[#1E3A8A] focus:ring-4 focus:ring-[#1E3A8A]/10 transition resize-none @error('message') border-red-400 @enderror"
                                placeholder="Tell us about your enquiry"
                            >{{ old('message') }}</textarea>
                            <div class="flex justify-between mt-1.5">
                                <p id="message-error" class="text-sm text-red-600 hidden" aria-live="polite"></p>
                                <p id="message-count" class="text-xs text-gray-400 ml-auto">
                                    <span id="charCount">0</span>/3000
                                </p>
                            </div>
                            @error('message')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Cloudflare Turnstile --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3" id="captcha-label">
                                Security Check <span class="text-red-500" aria-hidden="true">*</span>
                            </label>
                            <div class="rounded-2xl border border-gray-200 p-4 bg-[#F9FAFB] overflow-hidden"
                                 role="group" aria-labelledby="captcha-label">
                                <div class="cf-turnstile"
                                     data-sitekey="{{ config('services.turnstile.site_key') }}"
                                     data-theme="light"
                                     data-callback="onTurnstileSuccess"
                                     data-error-callback="onTurnstileError"
                                     data-expired-callback="onTurnstileExpired">
                                </div>
                                <p id="captcha-error" class="mt-2 text-sm text-red-600 hidden" aria-live="polite">
                                    Please complete the security check.
                                </p>
                            </div>
                            @error('captcha')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('cf-turnstile-response')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button
                                id="submitBtn"
                                type="submit"
                                class="inline-flex items-center gap-3 bg-[#F59E0B] hover:bg-amber-500 disabled:opacity-50 disabled:cursor-not-allowed text-white font-semibold px-8 py-4 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.02]"
                            >
                                <span id="submitBtnText">Submit Enquiry</span>
                                <svg id="submitIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                                <svg id="submitSpinner" class="hidden animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
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

<script>
(function () {
    'use strict';

    let turnstileVerified = false;

    // ── Turnstile callbacks ────────────────────────────────────────────
    window.onTurnstileSuccess = function () {
        turnstileVerified = true;
        document.getElementById('captcha-error').classList.add('hidden');
    };

    window.onTurnstileError = function () {
        turnstileVerified = false;
        document.getElementById('captcha-error').classList.remove('hidden');
        document.getElementById('captcha-error').textContent = 'Security check failed. Please try again.';
    };

    window.onTurnstileExpired = function () {
        turnstileVerified = false;
        document.getElementById('captcha-error').classList.remove('hidden');
        document.getElementById('captcha-error').textContent = 'Security check expired. Please verify again.';
    };

    // ── Validation rules ──────────────────────────────────────────────
    const rules = {
        name: {
            validate(v) {
                if (!v) return 'Full name is required.';
                if (v.length < 3) return 'Name must be at least 3 characters.';
                if (!/^[\p{L}\s.\-]+$/u.test(v)) return 'Name may only contain letters, spaces, hyphens, and dots.';
            }
        },
        email: {
            validate(v) {
                if (!v) return 'Email address is required.';
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) return 'Please enter a valid email address.';
            }
        },
        phone: {
            validate(v) {
                if (!v) return 'Phone number is required.';
                if (v.length < 7) return 'Phone number is too short.';
                if (!/^\+?[0-9\-\s()]+$/.test(v)) return 'Please enter a valid phone number.';
            }
        },
        subject: {
            validate(v) {
                if (!v) return 'Subject is required.';
                if (v.length < 5) return 'Subject must be at least 5 characters.';
            }
        },
        message: {
            validate(v) {
                if (!v) return 'Message is required.';
                if (v.length < 20) return 'Message must be at least 20 characters.';
            }
        },
    };

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const error = document.getElementById(fieldId + '-error');
        if (!field || !error) return;
        field.classList.add('border-red-400');
        field.classList.remove('border-gray-200');
        field.setAttribute('aria-invalid', 'true');
        error.textContent = message;
        error.classList.remove('hidden');
    }

    function clearError(fieldId) {
        const field = document.getElementById(fieldId);
        const error = document.getElementById(fieldId + '-error');
        if (!field || !error) return;
        field.classList.remove('border-red-400');
        field.classList.add('border-gray-200');
        field.setAttribute('aria-invalid', 'false');
        error.textContent = '';
        error.classList.add('hidden');
    }

    function validateField(id) {
        const field = document.getElementById(id);
        if (!field || !rules[id]) return true;
        const error = rules[id].validate(field.value.trim());
        if (error) { showError(id, error); return false; }
        clearError(id);
        return true;
    }

    // Live validation on blur
    ['name', 'email', 'phone', 'subject', 'message'].forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('blur', () => validateField(id));
        el.addEventListener('input', () => {
            // Clear error once user starts fixing it
            if (el.getAttribute('aria-invalid') === 'true') validateField(id);
        });
    });

    // Character counter for message
    const msgArea = document.getElementById('message');
    const charCount = document.getElementById('charCount');
    if (msgArea && charCount) {
        // Set initial count (for old() repopulation)
        charCount.textContent = msgArea.value.length;
        msgArea.addEventListener('input', () => {
            charCount.textContent = msgArea.value.length;
        });
    }

    // ── Form submit ────────────────────────────────────────────────────
    const form = document.getElementById('contactForm');
    if (form) {
        form.addEventListener('submit', function (e) {
            let valid = true;

            ['name', 'email', 'phone', 'subject', 'message'].forEach(id => {
                if (!validateField(id)) valid = false;
            });

            if (!turnstileVerified) {
                document.getElementById('captcha-error').classList.remove('hidden');
                document.getElementById('captcha-error').textContent = 'Please complete the security check.';
                valid = false;
            }

            if (!valid) {
                e.preventDefault();
                // Scroll to first error
                const firstError = form.querySelector('[aria-invalid="true"]');
                if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Show loading state
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('submitBtnText');
            const icon = document.getElementById('submitIcon');
            const spinner = document.getElementById('submitSpinner');
            if (btn) btn.disabled = true;
            if (btnText) btnText.textContent = 'Sending…';
            if (icon) icon.classList.add('hidden');
            if (spinner) spinner.classList.remove('hidden');
        });
    }
})();
</script>
@endsection