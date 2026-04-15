<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $defaultTitle = trim($__env->yieldContent('title'));
        $metaTitle = trim($__env->yieldContent('meta_title', $defaultTitle ? "{$defaultTitle} | GASCORP Nigeria" : 'GASCORP Nigeria'));
        $metaDescription = trim($__env->yieldContent('meta_description', 'GASCORP Nigeria develops integrated gas infrastructure, logistics, and energy access systems across Nigeria and West Africa.'));
        $metaKeywords = trim($__env->yieldContent('meta_keywords', 'GASCORP Nigeria, gas logistics, LPG distribution, CNG, LNG, gas infrastructure, energy access'));
        $metaRobots = trim($__env->yieldContent('meta_robots', 'index,follow,max-image-preview:large'));
        $canonicalUrl = trim($__env->yieldContent('canonical', url()->current()));
        $ogType = trim($__env->yieldContent('og_type', 'website'));
        $ogImage = trim($__env->yieldContent('og_image', 'https://i.postimg.cc/bJn1w7xB/gascorp.png'));
        $themeColor = trim($__env->yieldContent('theme_color', '#0D3D5D'));
    @endphp
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="robots" content="{{ $metaRobots }}">
    <meta name="author" content="Gas Corridor and Penetration Ltd">
    <meta name="theme-color" content="{{ $themeColor }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="alternate" type="text/plain" href="{{ url('/llms.txt') }}" title="LLMs.txt">
    <link rel="alternate" type="text/plain" href="{{ url('/ai.txt') }}" title="AI Policy">
    <link rel="sitemap" type="application/xml" href="{{ url('/sitemap.xml') }}">

    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:site_name" content="GASCORP Nigeria">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:locale" content="en_NG">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="https://i.postimg.cc/bJn1w7xB/gascorp.png">
    @vite(['resources/js/app.js','resources/css/app.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Gas Corridor and Penetration Ltd',
            'alternateName' => 'GASCORP Nigeria',
            'url' => config('app.url'),
            'logo' => asset('1.png'),
            'email' => 'info@gascorpnigeria.com',
            'telephone' => '+2347038392520',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Ocean Parade Towers, 1st Avenue, Banana Island, Ikoyi',
                'addressLocality' => 'Lagos',
                'addressCountry' => 'NG',
            ],
            'sameAs' => [
                'https://www.linkedin.com/company/gascorpnigeria',
                'https://www.facebook.com/gascorpnigeria',
                'https://www.twitter.com/gascorpnigeria',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    @stack('structured_data')
</head>
<body class="bg-white text-gray-700 antialiased">
    @include('layouts.menu')
    @yield('content')
    @include('layouts.footer')
</body>
</html>
