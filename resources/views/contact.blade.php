@extends('layouts.theme')
@section('title', 'Contact Us')
@section('meta_title', 'Contact GASCORP Nigeria | Gas Infrastructure Partnerships')
@section('meta_description', 'Contact GASCORP Nigeria for LPG, CNG and LNG infrastructure partnerships, logistics projects, storage development and energy access initiatives.')
@section('meta_keywords', 'contact gascorp, gas logistics contact, LPG CNG LNG partnership Nigeria, gas infrastructure enquiry')
@section('canonical', route('contact'))
@section('og_image', asset('bg.jpg'))
@section('theme_color', '#0f172a')

@push('structured_data')
    <script type="application/ld+json">
                {{-- Schema.org keys are written without their "@" prefix and restored after
             encoding: Blade would otherwise compile "@context" as a directive. --}}
{!! strtr(json_encode([
            'context' => 'https://schema.org',
            'type' => 'ContactPage',
            'name' => 'Contact GASCORP Nigeria',
            'url' => route('contact'),
            'description' => 'Get in touch with GASCORP Nigeria for gas infrastructure, logistics and market penetration enquiries.',
            'mainEntity' => [
                'type' => 'Organization',
                'name' => 'Gas Corridor and Penetration Ltd',
                'email' => 'info@gascorpnigeria.com',
                'telephone' => '+2347038392520',
                'address' => [
                    'type' => 'PostalAddress',
                    'streetAddress' => 'Ocean Parade Towers, 1st Avenue, Banana Island, Ikoyi',
                    'addressLocality' => 'Lagos',
                    'addressCountry' => 'NG',
                ],
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), ['"context"' => '"'.chr(64).'context"', '"type"' => '"'.chr(64).'type"']) !!}
    </script>
@endpush

@section('content')
<main role="main">

    <livewire:site.page-hero
        eyebrow="Contact GASCORP"
        title="Let's discuss the infrastructure"
        accent="your market needs."
        description="Speak with our team about LPG, CNG and LNG logistics, storage development, distribution partnerships and last-mile energy access."
        :image="asset('bg.jpg')"
        breadcrumb="Contact"
    />

    {{-- ================================================================
         Quick facts
         ================================================================ --}}
    <section class="border-b border-[#e6e9ee] bg-[#F9FAFB]">
        <div class="shell grid grid-cols-1 gap-px overflow-hidden border-x border-[#e6e9ee] bg-[#e6e9ee] md:grid-cols-3">
            @foreach ([
                ['Response focus', 'Partnerships and operations', 'Enquiries are routed to the relevant commercial or operations lead.'],
                ['Location', 'Ikoyi, Lagos State', 'Head office at Ocean Parade Towers, Banana Island.'],
                ['Energy scope', 'LPG, CNG and LNG', 'Storage, haulage, penetration and advisory.'],
            ] as $fact)
                <div class="bg-white p-7">
                    <p class="label text-[#475069]">{{ $fact[0] }}</p>
                    <p class="mt-3 font-[Manrope] text-lg font-bold text-[#0f172a]">{{ $fact[1] }}</p>
                    <p class="mt-2 text-sm leading-6 text-[#475069]">{{ $fact[2] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================================================================
         Direct lines + Livewire forms
         ================================================================ --}}
    <section class="section" aria-labelledby="contact-main">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:gap-16">
            <aside class="lg:col-span-4">
                <div class="relative overflow-hidden bg-[#0f172a] p-7 text-white md:p-9">
                    <div class="grid-lines absolute inset-0"></div>

                    <div class="relative">
                        <p class="label text-[#F59E0B]">Direct lines</p>
                        <h2 id="contact-main" class="heading heading-md mt-4">A clear route to the right team.</h2>
                        <p class="mt-4 text-sm leading-7 text-white/65">
                            Share the details of your enquiry and we will route it for review by the relevant
                            commercial or operations lead.
                        </p>

                        <div class="mt-9 space-y-7">
                            <div>
                                <p class="label text-white/45">Office address</p>
                                <address class="mt-3 not-italic text-sm leading-7 text-white/85">
                                    Ocean Parade Towers,<br>
                                    1st Avenue, Banana Island,<br>
                                    Ikoyi, Lagos State, Nigeria
                                </address>
                            </div>

                            <div>
                                <p class="label text-white/45">Phone</p>
                                <a href="tel:+2347038392520" class="mt-3 inline-block font-[Manrope] text-lg font-bold text-white transition hover:text-[#F59E0B]">
                                    +234 703 839 2520
                                </a>
                            </div>

                            <div>
                                <p class="label text-white/45">Email</p>
                                <a href="mailto:info@gascorpnigeria.com" class="mt-3 inline-block font-[Manrope] text-base font-bold text-white transition hover:text-[#F59E0B]">
                                    info@gascorpnigeria.com
                                </a>
                            </div>

                            <div>
                                <p class="label text-white/45">Business hours</p>
                                <p class="mt-3 text-sm leading-7 text-white/85">
                                    Monday – Friday, 08:00 – 17:00 WAT<br>
                                    Callback requests answered within one working day.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <livewire:site.callback-request />
                </div>
            </aside>

            <section class="lg:col-span-8" aria-label="Contact form">
                <livewire:site.contact-form />
            </section>
        </div>
    </section>

    {{-- ================================================================
         What happens next
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="contact-next">
        <div class="shell">
            <div class="max-w-3xl">
                <p class="eyebrow">What happens next</p>
                <h2 id="contact-next" class="display display-lg mt-6">From enquiry to deployment plan.</h2>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['01', 'Acknowledgement', 'You receive an immediate confirmation that your enquiry has been logged.'],
                    ['02', 'Routing', 'Your message is assigned to the commercial or operations lead closest to the topic.'],
                    ['03', 'Scoping call', 'We clarify volume, location, timeline and the commercial structure that fits.'],
                    ['04', 'Proposal', 'You receive a deployment approach covering infrastructure, logistics and delivery.'],
                ] as $index => $step)
                    <livewire:site.reveal :index="$index" :stagger="true" :key="'next-'.$index" class="bg-white">
                        <article class="flex h-full flex-col p-7">
                            <span class="card-index">{{ $step[0] }}</span>
                            <h3 class="heading mt-4 text-base">{{ $step[1] }}</h3>
                            <p class="mt-2.5 text-sm leading-7 text-[#475069]">{{ $step[2] }}</p>
                        </article>
                    </livewire:site.reveal>
                @endforeach
            </div>
        </div>
    </section>

</main>
@endsection