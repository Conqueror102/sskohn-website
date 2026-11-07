<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Streamsowers & Köhn — Full-service law firm in Lagos, Abuja & Port Harcourt' }}</title>
    <meta name="description" content="Streamsowers & Köhn is a full-service Nigerian law firm offering confidence across aviation, corporate and commercial, dispute resolution, energy, competition and legislative practice.">
    <meta name="theme-color" content="#F2EADD">
    <meta property="og:title" content="Streamsowers & Köhn — We give you confidence.">
    <meta property="og:description" content="A full-service law firm with offices in Lagos, Abuja and Port Harcourt.">
    <meta property="og:image" content="{{ asset('images/lagos.webp') }}">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='14' fill='%233B2619'/%3E%3Ctext x='50%25' y='58%25' text-anchor='middle' dominant-baseline='middle' font-family='Georgia,serif' font-size='34' fill='%23F2EADD'%3ES%3C/text%3E%3C/svg%3E">

    <link rel="preconnect" href="https://api.fontshare.com" crossorigin>
    <link rel="preconnect" href="https://cdn.fontshare.com" crossorigin>
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=boska@300,400,500,301,401&f[]=switzer@300,400,500,600&display=swap">
    <link rel="preload" as="image" href="{{ asset('images/statue.webp') }}">

    <script>
        document.documentElement.classList.replace('no-js', 'js');
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) document.documentElement.classList.add('reduced-motion');
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-paper text-ink antialiased">
    <a href="#main" class="skip-link">Skip to content</a>

    {{-- Preloader: wordmark rises, then the curtain lifts. Skipped for reduced motion. --}}
    <div class="loader" data-loader aria-hidden="true">
        <div class="loader__inner">
            <div class="loader__mark">
                @foreach (mb_str_split('SSKÖHN') as $char)
                    <span class="loader__char"><span>{{ $char }}</span></span>
                @endforeach
            </div>
            <div class="loader__meta">
                <span>Streamsowers &amp; Köhn</span>
                <span class="loader__count" data-loader-count>00</span>
            </div>
        </div>
    </div>

    <div class="grain" aria-hidden="true"></div>

    @include('partials.nav')

    <main id="main">
        @yield('content')
    </main>

    @include('partials.footer')

    @livewireScripts
</body>
</html>
