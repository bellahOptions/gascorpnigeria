@php
  $launchAt = now()->addMonthsNoOverflow(9)->startOfDay();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GASCORP App | Pre-launch</title>
  <meta name="description" content="GASCORP App is an upcoming logistics platform for booking gas transport, dispatch coordination, driver operations, and investor visibility.">
  <meta name="keywords" content="GASCORP App, gas logistics app, dispatch platform, LPG transport booking, CNG LNG operations">
  <meta name="robots" content="index,follow,max-image-preview:large">
  <meta name="theme-color" content="#082f49">
  <link rel="canonical" href="{{ route('app.landing') }}">
  <link rel="alternate" type="text/plain" href="{{ url('/llms.txt') }}" title="LLMs.txt">
  <link rel="alternate" type="text/plain" href="{{ url('/ai.txt') }}" title="AI Policy">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="GASCORP Nigeria">
  <meta property="og:title" content="GASCORP App | Pre-launch">
  <meta property="og:description" content="gas logistics with live corridor intelligence, dispatch orchestration, and asset performance visibility.">
  <meta property="og:url" content="{{ route('app.landing') }}">
  <meta property="og:image" content="https://i.postimg.cc/bJn1w7xB/gascorp.png">
  <meta property="og:locale" content="en_NG">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="GASCORP App | Pre-launch">
  <meta name="twitter:description" content="Join the waitlist for the GASCORP App launch and get early access to digital gas logistics operations.">
  <meta name="twitter:image" content="https://i.postimg.cc/bJn1w7xB/gascorp.png">

  <script type="application/ld+json">
    {!! json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'SoftwareApplication',
      'name' => 'GASCORP App',
      'applicationCategory' => 'BusinessApplication',
      'operatingSystem' => 'Web',
      'description' => 'Digital platform for gas logistics booking, dispatch operations, driver lifecycle updates, and investor fleet visibility.',
      'url' => route('app.landing'),
      'offers' => [
        '@type' => 'Offer',
        'price' => '0',
        'priceCurrency' => 'NGN',
        'availability' => 'https://schema.org/PreOrder',
      ],
      'publisher' => [
        '@type' => 'Organization',
        'name' => 'Gas Corridor and Penetration Ltd',
        'url' => url('/'),
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
  </script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main>
<div class="app-landing" data-launch-at="{{ $launchAt->toIso8601String() }}">
  <!-- NAV -->
  <nav class="nav">
    <div class="nav-inner">
      <a href="{{ route('app.landing') }}" class="nav-brand">
        <img src="{{ asset('2.png') }}" class="nav-logo-img" alt="GASCORP Nigeria">
      </a>
      <div class="nav-actions">
        <a href="{{ route('home') }}" class="btn-ghost">Corporate Site</a>
        <a href="#launch" class="btn-cta">Join Waitlist</a>
      </div>
      <button class="hamburger" id="ham" aria-label="Menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
    <div class="mobile-menu" id="mob-menu">
      <a href="{{ route('home') }}">Corporate Site</a>
      <a href="#launch" class="btn-cta">Join Waitlist</a>
    </div>
  </nav>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-grid grid-bg"></div>
    <div class="hero-content">
      <h1>Uber-like booking for gas logistics, built on <span>live corridor intelligence</span>.</h1>
      <p>Request a truck, assign a driver, monitor movement, track asset ROI, and control operations from one synchronized platform.</p>

      <div class="launch-countdown" aria-label="Launch countdown">
        <div class="countdown-block">
          <span class="countdown-value" data-countdown="days">000</span>
          <span class="countdown-label">Days</span>
        </div>
        <div class="countdown-block">
          <span class="countdown-value" data-countdown="hours">00</span>
          <span class="countdown-label">Hours</span>
        </div>
        <div class="countdown-block">
          <span class="countdown-value" data-countdown="minutes">00</span>
          <span class="countdown-label">Minutes</span>
        </div>
        <div class="countdown-block">
          <span class="countdown-value" data-countdown="seconds">00</span>
          <span class="countdown-label">Seconds</span>
        </div>
      </div>
      <p class="countdown-note">Estimated launch window: {{ $launchAt->format('F Y') }}</p>
    </div>
  </section>

  <!-- EXPERIENCE -->
  <section id="experience">
    <div class="section">
      <div class="two-col">
        <div>
          <p class="section-eyebrow">Product Experience</p>
          <h2>Clean booking flow in front. Deep operational control behind it.</h2>
          <p>Customers get fast booking and live trip visibility. Operators get data-rich dispatch intelligence and performance monitoring that scales across Nigeria and West Africa.</p>
        </div>
        <img src="https://img.freepik.com/free-photo/male-engineer-analyzed-industry-40-system-smart-manufacturing-plant_482257-126802.jpg?semt=ais_hybrid&w=740&q=80" alt="Logistics truck at night">
      </div>
    </div>
  </section>

  <!-- ROLES -->
  <section id="roles" class="dark-band">
    <div style="max-width:1120px;margin:0 auto;padding:0 20px">
      <p class="section-eyebrow">Role-Based Interface</p>
      <h2 style="font-size:clamp(26px,4vw,44px);font-family:var(--font-heading);color:#ecfeff;max-width:680px;margin-bottom:0;">Every user opens a different experience, all tied to one live system.</h2>
      <div class="role-grid">
        <div class="role-card">
          <div class="role-head">
            <span class="role-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372A3.375 3.375 0 0 0 21 16.125V15a2.25 2.25 0 0 0-2.25-2.25h-1.372M15 19.128v-.003a3 3 0 0 0-2.4-2.94A5.989 5.989 0 0 0 12 16a5.989 5.989 0 0 0-.6.03A3 3 0 0 0 9 19.125v.003m6 0A3.375 3.375 0 0 1 11.625 22.5h-.75A3.375 3.375 0 0 1 7.5 19.125v-.003m7.5 0c0-.621-.504-1.125-1.125-1.125h-3.75C9.504 18 9 18.504 9 19.125m6-8.625a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 2.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
            </span>
            <h3>Customers</h3>
          </div>
          <p>Pick service type, route, and truck capacity. Confirm price, track movement, and keep full invoice history.</p>
        </div>
        <div class="role-card">
          <div class="role-head">
            <span class="role-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="m3 16 4-2.286M7 13.714 11 16m-4-2.286v4.572m0-4.572L3 16m4 2.286L3 16m8 0 4-2.286m-4 2.286v4.572m0-4.572-4 2.286m4-2.286 4 2.286m0 0 4-2.286m-4 2.286v-4.572m0 4.572L15 16m4-2.286L15 16m4-2.286V9.143m0 4.571-4-2.285m4 2.285L23 16m-8-4.571V6.857M15 11.43 11 9.143m4 2.286V16m-4-6.857-4 2.286m4-2.286V6.857m0 2.286L7 11.429m0 0V6.857m0 4.572L3 9.143m8-2.286 4-2.286m-4 2.286L7 4.571m4 2.286V2.286"/></svg>
            </span>
            <h3>Drivers</h3>
          </div>
          <p>Receive assignments, follow route instructions, update trip status, and upload delivery confirmation.</p>
        </div>
        <div class="role-card">
          <div class="role-head">
            <span class="role-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18M6 15l3-3 2 2 4-4 3 3"/></svg>
            </span>
            <h3>Investors</h3>
          </div>
          <p>View active vs idle trucks, revenue by asset, route activity, utilization rate, and owner wallet performance.</p>
        </div>
        <div class="role-card">
          <div class="role-head">
            <span class="role-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 1 15 0m-15 0a7.5 7.5 0 0 0 15 0m-15 0H3m1.5 0H6m12 0h1.5m-1.5 0H18M9 12h6m-6 0a3 3 0 1 0 6 0 3 3 0 0 0-6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75V4.5m0 15v-2.25"/></svg>
            </span>
            <h3>Admins</h3>
          </div>
          <p>Manage users, fleet readiness, bookings, payout logic, disputes, compliance expiry, and analytics reporting.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- OPERATIONS -->
  <section id="operations">
    <div class="section">
      <div class="two-col">
        <div>
          <p class="section-eyebrow">How It Runs</p>
          <h2>Three-step journey from booking to verified delivery.</h2>
          <div class="steps">
            <div class="step">
              <span class="step-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 7.5h16M4 12h16m-16 4.5h9m-9-13h16a1.5 1.5 0 0 1 1.5 1.5v13A1.5 1.5 0 0 1 20 19.5H4A1.5 1.5 0 0 1 2.5 18V5A1.5 1.5 0 0 1 4 3.5Z"/>
                </svg>
              </span>
              <div class="step-content">
                <span class="step-num">Step 01</span>
                <p>User sets route, truck type, and schedule.</p>
              </div>
            </div>
            <div class="step">
              <span class="step-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m3 12 7-7m0 0h8v8m-8-8 4 4m-4 10h8a2 2 0 0 0 2-2V9m-10 10a2 2 0 0 1-2-2v-3"/>
                </svg>
              </span>
              <div class="step-content">
                <span class="step-num">Step 02</span>
                <p>Dispatch engine assigns nearest available driver.</p>
              </div>
            </div>
            <div class="step">
              <span class="step-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4m6-2a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"/>
                </svg>
              </span>
              <div class="step-content">
                <span class="step-num">Step 03</span>
                <p>Delivery tracked, confirmed, and closed with proof and payouts.</p>
              </div>
            </div>
          </div>
        </div>
        <img src="https://img.freepik.com/free-photo/industrial-plant-engineer-industry-40-manufacturing-facility_482257-126096.jpg?semt=ais_hybrid&w=740&q=80" alt="Dispatch operations planning">
      </div>
    </div>
  </section>

  <!-- STATS -->
  <div class="dark-band">
    <div style="max-width:1120px;margin:0 auto;padding:0 20px">
      <p class="section-eyebrow">Reliability Targets</p>
      <h2 style="font-size:clamp(24px,3.5vw,40px);font-family:var(--font-heading);color:#ecfeff;max-width:620px;margin-bottom:0;">Built as mission-critical digital infrastructure for corridor logistics.</h2>
      <div class="stats-grid">
        <div class="stat-card"><div class="num" data-count-target="99.9" data-count-decimals="1" data-count-suffix="%">0%</div><div class="lbl">Availability Goal</div></div>
        <div class="stat-card"><div class="num" data-count-target="2" data-count-prefix="<" data-count-suffix="s">0</div><div class="lbl">Response Time Target</div></div>
        <div class="stat-card"><div class="num" data-count-target="24" data-count-suffix="/7">0</div><div class="lbl">Trip Visibility</div></div>
        <div class="stat-card"><div class="num" data-count-target="6" data-count-pad="2">00</div><div class="lbl">Core User Roles</div></div>
      </div>
    </div>
  </div>

  <!-- CTA -->
  <div id="launch" class="cta-wrap">
    <div class="cta-box">
      <div class="cta-inner">
        <p class="section-eyebrow">Launch Program</p>
        <h2>Join the first wave of customers, fleet teams, and investors on the GASCORP App.</h2>
        <p>Request early access to shape onboarding priorities, corridor coverage, and operational rollout.</p>

        @if (session('waitlist_success'))
          <p class="waitlist-status waitlist-status-success">{{ session('waitlist_success') }}</p>
        @endif

        @if ($errors->any())
          <p class="waitlist-status waitlist-status-error">
            {{ $errors->first('waitlist') ?: 'Please review your waitlist details and try again.' }}
          </p>
        @endif

        <form action="{{ route('waitlist.store') }}" method="POST" class="waitlist-form" novalidate>
          @csrf
          <div class="waitlist-grid">
            <div>
              <label for="waitlist-name">Full Name</label>
              <input id="waitlist-name" name="name" type="text" value="{{ old('name') }}" required maxlength="120" placeholder="Your full name">
            </div>
            <div>
              <label for="waitlist-email">Work Email</label>
              <input id="waitlist-email" name="email" type="email" value="{{ old('email') }}" required maxlength="150" placeholder="you@company.com">
            </div>
          </div>

          <div class="waitlist-role">
            <label for="waitlist-role">I am joining as</label>
            <select id="waitlist-role" name="role" required>
              <option value="">Select role</option>
              <option value="customer" @selected(old('role') === 'customer')>Customer</option>
              <option value="driver" @selected(old('role') === 'driver')>Driver</option>
              <option value="investor" @selected(old('role') === 'investor')>Investor</option>
              <option value="admin" @selected(old('role') === 'admin')>Admin Team</option>
            </select>
          </div>

          <button type="submit" class="btn-primary waitlist-submit">Join Waitlist</button>
        </form>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <img src="{{ asset('2.png') }}" class="footer-logo" alt="GASCORP Nigeria">
      </div>
      <span>Gas Corridor and Penetration Ltd | &copy2026 All Rights Reserved</span>
    </div>
  </footer>
</div>
</main>
</body>
</html>
