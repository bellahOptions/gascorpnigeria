@extends('layouts.theme')
@section('title', 'Contact Us')
@section('meta_title', 'Contact GASCORP Nigeria')
@section('meta_description', 'Contact GASCORP Nigeria for LPG, CNG, and LNG infrastructure partnerships, logistics projects, and energy access initiatives.')
@section('meta_keywords', 'contact gascorp, gas logistics contact, LPG CNG LNG partnership Nigeria')
@section('canonical', route('contact'))
@section('og_image', asset('bg.jpg'))
@section('theme_color', '#111815')

@push('structured_data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => 'Contact GASCORP Nigeria',
            'url' => route('contact'),
            'description' => 'Get in touch with GASCORP Nigeria for gas infrastructure, logistics, and market penetration enquiries.',
            'mainEntity' => [
                '@type' => 'Organization',
                'name' => 'Gas Corridor and Penetration Ltd',
                'email' => 'info@gascorpnigeria.com',
                'telephone' => '+2347038392520',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@php
    $turnstileEnabled = filled(config('services.turnstile.site_key')) && filled(config('services.turnstile.secret_key'));
@endphp

@section('content')
<main class="bg-white text-gray-900">
    <section class="relative overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('bg.jpg') }}');">
        <div class="absolute inset-0 bg-[#111815]/82"></div>
        <div class="relative mx-auto grid min-h-[58vh] max-w-7xl items-end px-5 py-20 md:px-10 lg:px-16">
            <div class="max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-widest text-[#D99A1E]">Contact GASCORP</p>
                <h1 class="mt-4 text-4xl font-bold leading-tight text-white md:text-6xl">
                    Let us discuss the gas infrastructure your market needs.
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-gray-200">
                    Speak with our team about LPG, CNG, LNG logistics, storage, distribution partnerships, and last-mile energy access.
                </p>
            </div>
        </div>
    </section>

    <section class="border-b border-gray-200 bg-[#F6F8F7]">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-5 px-5 py-8 md:grid-cols-3 md:px-10 lg:px-16">
            <div class="border-l-2 border-[#0E7A52] bg-white p-5 shadow-sm">
                <p class="text-sm font-bold uppercase tracking-widest text-gray-500">Response Focus</p>
                <p class="mt-2 text-lg font-bold text-gray-950">Partnerships and operations</p>
            </div>
            <div class="border-l-2 border-[#0E7A52] bg-white p-5 shadow-sm">
                <p class="text-sm font-bold uppercase tracking-widest text-gray-500">Location</p>
                <p class="mt-2 text-lg font-bold text-gray-950">Ikoyi, Lagos State</p>
            </div>
            <div class="border-l-2 border-[#0E7A52] bg-white p-5 shadow-sm">
                <p class="text-sm font-bold uppercase tracking-widest text-gray-500">Energy Scope</p>
                <p class="mt-2 text-lg font-bold text-gray-950">LPG, CNG, and LNG</p>
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-5 py-16 md:px-10 lg:grid-cols-5 lg:px-16 lg:py-20">
        <aside class="lg:col-span-2">
            <div class="border border-gray-200 bg-[#111815] p-7 text-white shadow-sm md:p-8">
                <p class="text-sm font-bold uppercase tracking-widest text-[#D99A1E]">Direct Lines</p>
                <h2 class="mt-4 text-3xl font-bold leading-tight">A clear route to the right team.</h2>
                <p class="mt-4 leading-7 text-gray-300">
                    Share the details of your enquiry and our team will route it for review by the relevant commercial or operations lead.
                </p>

                <div class="mt-8 space-y-6">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-widest text-gray-400">Office Address</p>
                        <p class="mt-2 leading-7 text-gray-100">
                            Ocean Parade Towers,<br>
                            1st Avenue, Banana Island,<br>
                            Ikoyi, Lagos State
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-bold uppercase tracking-widest text-gray-400">Phone</p>
                        <a href="tel:07038392520" class="mt-2 inline-block text-lg font-bold text-white hover:text-[#D99A1E]">07038392520</a>
                    </div>
                    <div>
                        <p class="text-sm font-bold uppercase tracking-widest text-gray-400">Email</p>
                        <a href="mailto:info@gascorpnigeria.com" class="mt-2 inline-block text-lg font-bold text-white hover:text-[#D99A1E]">info@gascorpnigeria.com</a>
                    </div>
                </div>
            </div>
        </aside>

        <section class="lg:col-span-3">
            <div class="border border-gray-200 bg-white p-6 shadow-sm md:p-8">
                <div class="max-w-2xl">
                    <p class="text-sm font-bold uppercase tracking-widest text-[#0E7A52]">Send a Message</p>
                    <h2 class="mt-3 text-3xl font-bold text-gray-950 md:text-4xl">Tell us what you are building.</h2>
                    <p class="mt-4 leading-7 text-gray-600">
                        Complete the form below and include enough detail for a useful first response.
                    </p>
                </div>

                @if (session('success'))
                    <div role="alert" class="mt-6 border border-green-200 bg-green-50 px-5 py-4 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div role="alert" class="mt-6 border border-red-200 bg-red-50 px-5 py-4 text-red-800">
                        <p class="font-bold">Please review the highlighted fields.</p>
                        <ul class="mt-2 space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" class="mt-8 space-y-6" novalidate>
                    @csrf
                    <input type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true" class="absolute left-[-9999px] h-0 opacity-0">
                    <input type="hidden" name="form_started_at" value="{{ now()->timestamp }}">

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-800">Full Name <span class="text-red-600">*</span></label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" maxlength="120" required autocomplete="name" aria-describedby="name-error" class="mt-2 w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-gray-950 outline-none transition focus:border-[#0E7A52] focus:ring-4 focus:ring-[#0E7A52]/10 @error('name') border-red-500 @enderror" placeholder="Jane Doe">
                            <p id="name-error" class="mt-2 text-sm text-red-700 @error('name') block @else hidden @enderror" aria-live="polite">@error('name') {{ $message }} @enderror</p>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-800">Email Address <span class="text-red-600">*</span></label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" maxlength="150" required autocomplete="email" aria-describedby="email-error" class="mt-2 w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-gray-950 outline-none transition focus:border-[#0E7A52] focus:ring-4 focus:ring-[#0E7A52]/10 @error('email') border-red-500 @enderror" placeholder="jane@company.com">
                            <p id="email-error" class="mt-2 text-sm text-red-700 @error('email') block @else hidden @enderror" aria-live="polite">@error('email') {{ $message }} @enderror</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-800">Phone Number <span class="text-red-600">*</span></label>
                            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" maxlength="20" required autocomplete="tel" aria-describedby="phone-error" class="mt-2 w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-gray-950 outline-none transition focus:border-[#0E7A52] focus:ring-4 focus:ring-[#0E7A52]/10 @error('phone') border-red-500 @enderror" placeholder="+234 803 000 0000">
                            <p id="phone-error" class="mt-2 text-sm text-red-700 @error('phone') block @else hidden @enderror" aria-live="polite">@error('phone') {{ $message }} @enderror</p>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-bold text-gray-800">Subject <span class="text-red-600">*</span></label>
                            <input id="subject" name="subject" type="text" value="{{ old('subject') }}" maxlength="150" required aria-describedby="subject-error" class="mt-2 w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-gray-950 outline-none transition focus:border-[#0E7A52] focus:ring-4 focus:ring-[#0E7A52]/10 @error('subject') border-red-500 @enderror" placeholder="Gas logistics partnership">
                            <p id="subject-error" class="mt-2 text-sm text-red-700 @error('subject') block @else hidden @enderror" aria-live="polite">@error('subject') {{ $message }} @enderror</p>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-800">Message <span class="text-red-600">*</span></label>
                        <textarea id="message" name="message" rows="7" maxlength="3000" required aria-describedby="message-error message-count" class="mt-2 w-full resize-y rounded-md border border-gray-300 bg-white px-4 py-3 text-gray-950 outline-none transition focus:border-[#0E7A52] focus:ring-4 focus:ring-[#0E7A52]/10 @error('message') border-red-500 @enderror" placeholder="Share your location, volume needs, timeline, and the type of support required.">{{ old('message') }}</textarea>
                        <div class="mt-2 flex items-start justify-between gap-4">
                            <p id="message-error" class="text-sm text-red-700 @error('message') block @else hidden @enderror" aria-live="polite">@error('message') {{ $message }} @enderror</p>
                            <p id="message-count" class="ml-auto text-sm text-gray-500"><span id="charCount">0</span>/3000</p>
                        </div>
                    </div>

                    @if ($turnstileEnabled)
                        <div>
                            <label class="block text-sm font-bold text-gray-800" id="captcha-label">Security Check <span class="text-red-600">*</span></label>
                            <div class="mt-2 border border-gray-300 bg-[#F6F8F7] p-4" role="group" aria-labelledby="captcha-label">
                                <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}" data-theme="light" data-callback="onTurnstileSuccess" data-error-callback="onTurnstileError" data-expired-callback="onTurnstileExpired"></div>
                                <p id="captcha-error" class="mt-2 hidden text-sm text-red-700" aria-live="polite"></p>
                            </div>
                            @error('captcha')
                                <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
                            @enderror
                            @error('cf-turnstile-response')
                                <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <p id="form-status" class="hidden border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" aria-live="polite"></p>

                    <div class="flex flex-col gap-4 border-t border-gray-200 pt-6 sm:flex-row sm:items-center sm:justify-between">
                        <p class="text-sm leading-6 text-gray-500">
                            Fields marked with an asterisk are required.
                        </p>
                        <button id="submitBtn" type="submit" class="inline-flex items-center justify-center gap-3 rounded-md bg-[#0E7A52] px-6 py-3 font-bold text-white shadow-sm transition hover:bg-[#095F40] disabled:cursor-not-allowed disabled:opacity-60">
                            <span id="submitBtnText">Submit Enquiry</span>
                            <svg id="submitIcon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                            </svg>
                            <svg id="submitSpinner" class="hidden h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </section>
</main>

@if ($turnstileEnabled)
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
@endif

<script>
(function () {
    'use strict';

    const turnstileEnabled = @json($turnstileEnabled);
    let turnstileVerified = !turnstileEnabled;

    const rules = {
        name(value) {
            if (!value) return 'Full name is required.';
            if (value.length < 3) return 'Name must be at least 3 characters.';
            if (!/^[\p{L}\s.\-]+$/u.test(value)) return 'Name may only contain letters, spaces, hyphens, and dots.';
        },
        email(value) {
            if (!value) return 'Email address is required.';
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value)) return 'Please enter a valid email address.';
        },
        phone(value) {
            if (!value) return 'Phone number is required.';
            if (value.length < 7) return 'Phone number is too short.';
            if (!/^\+?[0-9\-\s()]+$/.test(value)) return 'Please enter a valid phone number.';
        },
        subject(value) {
            if (!value) return 'Subject is required.';
            if (value.length < 5) return 'Subject must be at least 5 characters.';
        },
        message(value) {
            if (!value) return 'Message is required.';
            if (value.length < 20) return 'Message must be at least 20 characters.';
        },
    };

    function setFieldError(id, message) {
        const field = document.getElementById(id);
        const error = document.getElementById(id + '-error');

        if (!field || !error) return;

        field.classList.add('border-red-500');
        field.classList.remove('border-gray-300');
        field.setAttribute('aria-invalid', 'true');
        error.textContent = message;
        error.classList.remove('hidden');
    }

    function clearFieldError(id) {
        const field = document.getElementById(id);
        const error = document.getElementById(id + '-error');

        if (!field || !error) return;

        field.classList.remove('border-red-500');
        field.classList.add('border-gray-300');
        field.setAttribute('aria-invalid', 'false');
        error.textContent = '';
        error.classList.add('hidden');
    }

    function validateField(id) {
        const field = document.getElementById(id);
        const validator = rules[id];

        if (!field || !validator) return true;

        const message = validator(field.value.trim());
        if (message) {
            setFieldError(id, message);
            return false;
        }

        clearFieldError(id);
        return true;
    }

    function setFormStatus(message) {
        const status = document.getElementById('form-status');
        if (!status) return;

        status.textContent = message;
        status.classList.toggle('hidden', !message);
    }

    window.onTurnstileSuccess = function () {
        turnstileVerified = true;
        const error = document.getElementById('captcha-error');
        if (error) {
            error.textContent = '';
            error.classList.add('hidden');
        }
    };

    window.onTurnstileError = function () {
        turnstileVerified = false;
        const error = document.getElementById('captcha-error');
        if (error) {
            error.textContent = 'Security check failed. Please try again.';
            error.classList.remove('hidden');
        }
    };

    window.onTurnstileExpired = function () {
        turnstileVerified = false;
        const error = document.getElementById('captcha-error');
        if (error) {
            error.textContent = 'Security check expired. Please verify again.';
            error.classList.remove('hidden');
        }
    };

    const fieldIds = ['name', 'email', 'phone', 'subject', 'message'];

    fieldIds.forEach((id) => {
        const field = document.getElementById(id);
        if (!field) return;

        field.addEventListener('blur', () => validateField(id));
        field.addEventListener('input', () => {
            if (field.getAttribute('aria-invalid') === 'true') {
                validateField(id);
            }
        });
    });

    const message = document.getElementById('message');
    const charCount = document.getElementById('charCount');

    if (message && charCount) {
        charCount.textContent = message.value.length;
        message.addEventListener('input', () => {
            charCount.textContent = message.value.length;
        });
    }

    const form = document.getElementById('contactForm');

    if (!form) return;

    form.addEventListener('submit', function (event) {
        setFormStatus('');

        let valid = true;

        fieldIds.forEach((id) => {
            if (!validateField(id)) valid = false;
        });

        if (turnstileEnabled && !turnstileVerified) {
            const error = document.getElementById('captcha-error');
            if (error) {
                error.textContent = 'Please complete the security check.';
                error.classList.remove('hidden');
            }
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            const firstError = form.querySelector('[aria-invalid="true"]');
            if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }

        const button = document.getElementById('submitBtn');
        const buttonText = document.getElementById('submitBtnText');
        const icon = document.getElementById('submitIcon');
        const spinner = document.getElementById('submitSpinner');

        if (button) button.disabled = true;
        if (buttonText) buttonText.textContent = 'Sending';
        if (icon) icon.classList.add('hidden');
        if (spinner) spinner.classList.remove('hidden');
    });
})();
</script>
@endsection
