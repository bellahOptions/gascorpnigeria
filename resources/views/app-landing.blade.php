@extends('layouts.theme')
@section('title', 'GASCORP App')
@section('meta_title', 'GASCORP App | Digital Gas Logistics Platform')
@section('meta_description', 'The GASCORP App puts gas logistics booking, dispatch coordination, driver operations and asset performance on one platform. Pre-launch — join the waitlist for early access.')
@section('meta_keywords', 'GASCORP App, gas logistics app, dispatch platform, LPG transport booking, CNG LNG operations, fleet management software Nigeria')
@section('canonical', route('app.landing'))
@section('og_image', asset('bg.jpg'))
@section('theme_color', '#0F2B5E')

@push('structured_data')
    <script type="application/ld+json">
        {{-- Schema.org keys are written without their "@" prefix and restored after
             encoding: Blade would otherwise compile "@context" as a directive. --}}
        {!! strtr(json_encode([
            'context' => 'https://schema.org',
            'type' => 'SoftwareApplication',
            'name' => 'GASCORP App',
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Android, iOS, Web',
            'description' => 'Digital platform for gas logistics booking, dispatch operations, driver trip updates and investor fleet visibility.',
            'url' => route('app.landing'),
            'featureList' => [
                'Gas transport booking with route and capacity selection',
                'Dispatch assignment and live trip visibility',
                'Driver trip updates and proof of delivery',
                'Asset utilisation and owner wallet reporting',
            ],
            'offers' => [
                'type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'NGN',
                'availability' => 'https://schema.org/PreOrder',
            ],
            'publisher' => [
                'type' => 'Organization',
                'name' => 'Gas Corridor and Penetration Ltd',
                'url' => url('/'),
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), ['"context"' => '"'.chr(64).'context"', '"type"' => '"'.chr(64).'type"']) !!}
    </script>
@endpush

@section('content')
<main role="main">

    {{-- ================================================================
         Hero — statement, status, countdown, first mockup
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="app-hero">
        <div class="shell grid gap-14 lg:grid-cols-12 lg:items-center lg:gap-16">
            <div class="lg:col-span-7">
                <p class="label inline-flex items-center gap-2.5 border border-[#F59E0B]/50 bg-[#F59E0B]/8 px-3.5 py-2 text-[#b26f05]">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-[#F59E0B]"></span>
                    Pre-launch
                </p>

                <h1 id="app-hero" class="display display-lg mt-7">
                    Booking for gas logistics,
                    <span class="block text-[#1E3A8A]">built on live corridor intelligence.</span>
                </h1>

                <p class="lede mt-7 max-w-2xl">
                    Request a truck, assign a driver, follow the movement and track asset performance from one
                    platform. The GASCORP App brings the corridor's operations into a single, auditable system —
                    for customers, drivers, fleet owners and our own control room.
                </p>

                <div class="mt-9 flex flex-wrap gap-3">
                    <a href="#launch" class="btn btn-gold btn-lg">
                        Join the waitlist
                        <svg class="h-4 w-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </a>
                    <a href="#screens" class="btn btn-outline btn-lg">See the interface</a>
                </div>

                <dl class="mt-12 grid grid-cols-2 gap-x-8 gap-y-8 border-t border-[#e6e9ee] pt-8 sm:grid-cols-4">
                    @foreach ([
                        ['figure' => '4', 'label' => 'Role-based interfaces'],
                        ['figure' => '24/7', 'label' => 'Trip visibility'],
                        ['figure' => '3', 'label' => 'Fuel streams covered'],
                        ['figure' => '0', 'label' => 'Paper dispatch'],
                    ] as $fact)
                        <div>
                            <dt class="sr-only">{{ $fact['label'] }}</dt>
                            <dd>
                                <span class="stat-figure text-3xl md:text-4xl">{{ $fact['figure'] }}</span>
                                <span class="stat-label block text-[#475069]">{{ $fact['label'] }}</span>
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </div>

            <div class="lg:col-span-5">
                <div class="flex flex-col items-center">
                    <x-phone size="lg" label="Booking — customer app">
                        <x-phone-screen variant="customer" />
                    </x-phone>

                    <div class="mt-10 w-full max-w-sm border border-[#e6e9ee] bg-white p-5">
                        <div class="flex items-center gap-4">
                            <span class="app-icon" aria-hidden="true">GC</span>
                            <div>
                                <p class="font-[Manrope] text-sm font-bold text-[#0f172a]">GASCORP App</p>
                                <p class="mt-0.5 font-[DM_Mono,monospace] text-[0.625rem] uppercase tracking-[0.16em] text-[#475069]">
                                    Android &middot; iOS &middot; Web
                                </p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <livewire:site.launch-countdown />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         Screen mockups
         ================================================================ --}}
    <section class="section" id="screens" aria-labelledby="app-screens">
        <div class="shell">
            <div class="grid gap-8 lg:grid-cols-12 lg:items-end">
                <div class="lg:col-span-7">
                    <p class="eyebrow">Interface preview</p>
                    <h2 id="app-screens" class="display display-lg mt-6">One platform, four surfaces.</h2>
                </div>
                <div class="lg:col-span-5">
                    <p class="text-[1.0625rem] leading-8 text-[#475069]">
                        Every role opens a different experience, all bound to the same live operational record.
                        These are illustrative layouts of the workflows the app will ship with.
                    </p>
                </div>
            </div>

            <ol class="mt-16 grid grid-cols-1 justify-items-center gap-12 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
                @foreach ([
                    ['variant' => 'customer', 'index' => '01', 'label' => 'Customer', 'caption' => 'Book a movement, confirm price and follow the trip.'],
                    ['variant' => 'driver', 'index' => '02', 'label' => 'Driver', 'caption' => 'Receive assignments, update status, upload delivery proof.'],
                    ['variant' => 'investor', 'index' => '03', 'label' => 'Investor', 'caption' => 'Utilisation, revenue by asset and owner wallet performance.'],
                    ['variant' => 'admin', 'index' => '04', 'label' => 'Admin', 'caption' => 'Fleet readiness, dispatch queue, payouts and compliance.'],
                ] as $screen)
                    <li class="flex w-full flex-col items-center">
                        <x-phone :label="$screen['index'].' — '.$screen['label']">
                            <x-phone-screen :variant="$screen['variant']" />
                        </x-phone>
                        <p class="mt-4 max-w-[15rem] text-center text-sm leading-6 text-[#475069]">
                            {{ $screen['caption'] }}
                        </p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- ================================================================
         Why it exists
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="app-problem">
        <div class="shell grid gap-14 lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-5">
                <p class="eyebrow">Why it exists</p>
                <h2 id="app-problem" class="display display-lg mt-6">
                    Gas logistics still runs on phone calls and paper.
                </h2>

                <p class="lede mt-7">
                    Booking is negotiated by call. Dispatch lives in a group chat. Proof of delivery is a
                    photograph on someone's handset. By the time a fleet owner asks how an asset performed last
                    month, the answer is an estimate.
                </p>

                <p class="mt-5 text-[1.0625rem] leading-8 text-[#475069]">
                    The GASCORP App replaces that with one recorded workflow: every request, assignment, movement
                    and delivery written to the same ledger, visible to whoever is entitled to see it.
                </p>
            </div>

            <div class="lg:col-span-7">
                <div class="grid gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] sm:grid-cols-2">
                    @foreach ([
                        ['Before', 'Booking by phone call', 'No record of what was agreed, at what price, for which date.'],
                        ['After', 'Structured booking request', 'Route, capacity, cargo and price captured once and reused.'],
                        ['Before', 'Dispatch by group chat', 'Assignments are verbal, unverifiable and impossible to audit.'],
                        ['After', 'Dispatch with assignment trail', 'Every job carries an owner, a driver and a status history.'],
                        ['Before', 'Proof by photograph', 'Delivery evidence sits on a personal device.'],
                        ['After', 'Proof attached to the trip', 'Confirmation is stored against the job and the asset.'],
                        ['Before', 'Performance by estimate', 'Utilisation and revenue are reconstructed after the fact.'],
                        ['After', 'Performance from live data', 'Utilisation, revenue and readiness read from operations.'],
                    ] as $index => $item)
                        @php $isAfter = $index % 2 === 1; @endphp
                        <div @class(['bg-white p-6', 'sm:border-l-2 sm:border-l-[#0D9488]' => $isAfter])>
                            <p @class([
                                'label',
                                'text-[#b26f05]' => ! $isAfter,
                                'text-[#0a6f66]' => $isAfter,
                            ])>{{ $item[0] }}</p>
                            <h3 class="heading mt-3 text-base">{{ $item[1] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-[#475069]">{{ $item[2] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================
         Roles
         ================================================================ --}}
    <section class="section" aria-labelledby="app-roles">
        <div class="shell">
            <div class="max-w-3xl">
                <p class="eyebrow">Role-based access</p>
                <h2 id="app-roles" class="display display-lg mt-6">Everyone sees exactly what they should.</h2>
                <p class="lede mt-7">
                    The same job looks different depending on who opens it. Each role gets the fields, actions and
                    reporting that belong to their part of the corridor — nothing more.
                </p>
            </div>

            <div class="mt-16 divide-y divide-[#e6e9ee] border-y border-[#e6e9ee]">
                @foreach ([
                    [
                        'index' => '01',
                        'role' => 'Customers',
                        'body' => 'Set the route, choose truck type and capacity, confirm the price, then follow the movement through to delivery with the full invoice history attached.',
                        'points' => ['Booking with route and capacity', 'Price confirmation before dispatch', 'Live trip visibility', 'Invoice and delivery history'],
                    ],
                    [
                        'index' => '02',
                        'role' => 'Drivers',
                        'body' => 'Receive an assignment with route instructions, progress the trip status at each stage and close the job with verified proof of delivery.',
                        'points' => ['Assignment inbox', 'Route and site instructions', 'Stage-by-stage status updates', 'Proof-of-delivery capture'],
                    ],
                    [
                        'index' => '03',
                        'role' => 'Fleet owners & investors',
                        'body' => 'See how each asset is actually performing: active versus idle time, revenue by asset, route activity, utilisation rate and owner wallet balance.',
                        'points' => ['Utilisation by asset', 'Revenue and route activity', 'Readiness and downtime', 'Owner wallet performance'],
                    ],
                    [
                        'index' => '04',
                        'role' => 'Operations & admin',
                        'body' => 'Run the corridor: users, fleet readiness, the dispatch queue, booking exceptions, payout logic, disputes and compliance expiry, with analytics on top.',
                        'points' => ['Dispatch queue control', 'Fleet readiness and compliance', 'Payout and dispute handling', 'Operational analytics'],
                    ],
                ] as $role)
                    <div class="grid gap-6 py-10 md:grid-cols-12 md:gap-10">
                        <div class="md:col-span-1">
                            <span class="row-num-index">{{ $role['index'] }}</span>
                        </div>
                        <div class="md:col-span-4">
                            <h3 class="heading heading-sm">{{ $role['role'] }}</h3>
                        </div>
                        <div class="md:col-span-4">
                            <p class="text-[0.9375rem] leading-7 text-[#475069]">{{ $role['body'] }}</p>
                        </div>
                        <ul class="space-y-2.5 md:col-span-3">
                            @foreach ($role['points'] as $point)
                                <li class="flex items-start gap-2.5 text-sm text-[#0f172a]">
                                    <span class="mt-1.5 inline-block h-1.5 w-1.5 shrink-0 rounded-full bg-[#0D9488]"></span>
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================================================================
         How it runs
         ================================================================ --}}
    <section class="section surface-ink relative overflow-hidden" aria-labelledby="app-flow">
        <div class="grid-lines absolute inset-0"></div>

        <div class="shell relative">
            <div class="grid gap-10 lg:grid-cols-12 lg:items-end">
                <div class="lg:col-span-7">
                    <p class="eyebrow eyebrow-light">How it runs</p>
                    <h2 id="app-flow" class="display display-lg mt-6 text-white">
                        From booking to verified delivery in three steps.
                    </h2>
                </div>
                <div class="lg:col-span-5">
                    <p class="text-[1.0625rem] leading-8 text-white/65">
                        One request creates one job. That job carries its own state until the delivery is closed
                        and the payout is settled.
                    </p>
                </div>
            </div>

            <ol class="mt-16 grid gap-px overflow-hidden border border-white/12 bg-white/12 md:grid-cols-3">
                @foreach ([
                    ['01', 'Book', 'The customer sets route, truck type, cargo and schedule. The app returns a price and a confirmed slot.'],
                    ['02', 'Dispatch', 'The dispatch engine assigns the nearest suitable asset and driver, and pushes the assignment to the driver app.'],
                    ['03', 'Deliver & settle', 'Movement is tracked, delivery is confirmed with proof, the job closes and payouts are reconciled.'],
                ] as $step)
                    <li class="bg-[#0f172a] p-8">
                        <span class="row-num-index">{{ $step[0] }}</span>
                        <h3 class="heading heading-sm mt-4 text-white">{{ $step[1] }}</h3>
                        <p class="mt-3 text-[0.9375rem] leading-7 text-white/60">{{ $step[2] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- ================================================================
         Platform characteristics
         ================================================================ --}}
    <section class="section surface-canvas" aria-labelledby="app-platform">
        <div class="shell">
            <div class="max-w-3xl">
                <p class="eyebrow">Platform characteristics</p>
                <h2 id="app-platform" class="display display-lg mt-6">Built as operations infrastructure, not an app.</h2>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-px overflow-hidden border border-[#e6e9ee] bg-[#e6e9ee] sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Availability target', '99.9%', 'Dispatch decisions are time-critical; the platform is engineered to stay reachable.'],
                    ['Response target', '< 2s', 'Booking and status actions are designed to feel immediate on mobile networks.'],
                    ['Trip visibility', '24/7', 'Every movement is observable end to end, including out-of-hours transfers.'],
                    ['Corridor coverage', '774 LGAs', 'The rollout roadmap follows the national penetration programme.'],
                    ['Audit trail', 'Every action', 'Bookings, assignments and confirmations are recorded and attributable.'],
                    ['Access model', 'Role-based', 'Data is scoped to the role, so partners only see what concerns them.'],
                ] as $item)
                    <article class="bg-white p-7">
                        <p class="label text-[#475069]">{{ $item[0] }}</p>
                        <p class="stat-figure mt-4 text-2xl md:text-3xl">{{ $item[1] }}</p>
                        <p class="mt-3 text-sm leading-7 text-[#475069]">{{ $item[2] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================================================================
         Waitlist
         ================================================================ --}}
    <section class="section" id="launch" aria-labelledby="app-launch">
        <div class="shell grid gap-14 lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-5">
                <p class="eyebrow">Launch programme</p>
                <h2 id="app-launch" class="display display-lg mt-6">
                    Join the first wave.
                </h2>

                <p class="lede mt-7">
                    Early access shapes onboarding priorities, corridor coverage and the sequence of the rollout.
                    Tell us which side of the corridor you are on and we will bring you in as capacity opens.
                </p>

                <ul class="mt-9 space-y-4">
                    @foreach ([
                        'Early access ahead of public release',
                        'Input into corridor and route priorities',
                        'Onboarding support for your first bookings',
                        'No cost to join and no obligation',
                    ] as $benefit)
                        <li class="flex items-start gap-3.5">
                            <span class="mt-0.5 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#0D9488] text-white">
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7" />
                                </svg>
                            </span>
                            <span class="text-[0.9375rem] leading-7 text-[#475069]">{{ $benefit }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-10 max-w-sm">
                    <livewire:site.launch-countdown />
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="border border-[#e6e9ee] bg-[#F9FAFB] p-7 md:p-10">
                    <div class="flex items-start gap-4">
                        <span class="app-icon" aria-hidden="true">GC</span>
                        <div>
                            <h3 class="heading heading-sm">Request early access</h3>
                            <p class="mt-2 text-sm leading-7 text-[#475069]">
                                Four fields. We will confirm your place and let you know as onboarding opens.
                            </p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <livewire:site.waitlist-form :source="'app-page'" />
                    </div>

                    <p class="mt-6 border-t border-[#e6e9ee] pt-5 text-xs leading-6 text-[#475069]">
                        Prefer to speak to the team first? Call
                        <a href="tel:+2347038392520" class="font-semibold text-[#1E3A8A] underline decoration-[#F59E0B] underline-offset-2">+234 703 839 2520</a>
                        or
                        <a href="{{ route('contact') }}" class="font-semibold text-[#1E3A8A] underline decoration-[#F59E0B] underline-offset-2" wire:navigate>send an enquiry</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
