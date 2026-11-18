<!doctype html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#050505">
    <meta name="robots" content="index,follow,max-image-preview:large">
    <meta name="author" content="Magic Code">
    <meta name="description" content="{{ $metaDescription ?? 'Magic Code — freelance digital studio au Maroc : sites web Laravel, applications mobiles, data analytics, automatisation et intelligence artificielle.' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/magic-code-logo.png') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Magic Code">
    <meta property="og:title" content="{{ $title ?? 'Magic Code — We Code The Magic' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Web, Mobile, Data & AI — des solutions digitales modernes, utiles et performantes.' }}">
    <meta property="og:image" content="{{ asset('images/magic-code-og.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Magic Code — We Code The Magic' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Web, Mobile, Data & AI — des solutions digitales modernes, utiles et performantes.' }}">
    <meta name="twitter:image" content="{{ asset('images/magic-code-og.png') }}">

    <title>{{ $title ?? 'Magic Code — We Code The Magic' }}</title>

    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/magic-code.css') }}">
    @stack('head')
</head>
<body>
    <!-- Reading Progress Bar -->
    <div class="scroll-progress-bar" id="scrollProgress" aria-hidden="true"></div>

    <div class="noise" aria-hidden="true"></div>

    {{-- Magic Starfield Canvas (behind everything, pointer-events: none) --}}
    <canvas id="magicStarfield" aria-hidden="true"></canvas>

    @include('partials.header')

    <main id="mainContent">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Floating WhatsApp Widget -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('contact.whatsapp')) }}?text={{ rawurlencode('Bonjour Magic Code, je souhaite échanger sur un projet.') }}"
       class="floating-whatsapp-widget"
       id="floatingWhatsApp"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Discuter directement sur WhatsApp"
    >
        <span class="whatsapp-ping" aria-hidden="true"></span>
        <svg class="whatsapp-icon" viewBox="0 0 24 24" fill="currentColor" width="26" height="26" aria-hidden="true">
            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2zm.01 1.67c2.2 0 4.26.86 5.82 2.41a8.16 8.16 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.42 0-2.82-.37-4.06-1.07l-.29-.17-3.02.79.81-2.95-.19-.3a8.21 8.21 0 0 1-1.26-4.36c0-4.54 3.7-8.24 8.24-8.24zm4.52 11.64c-.25-.12-1.47-.72-1.7-.8-.23-.08-.39-.12-.56.12-.17.25-.64.8-.79.97-.14.16-.29.18-.54.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.38.11-.5.11-.11.25-.29.37-.43.12-.14.16-.25.25-.41.08-.16.04-.31-.02-.43-.06-.12-.56-1.35-.77-1.84-.2-.48-.41-.42-.56-.43h-.48c-.16 0-.43.06-.66.31-.23.25-.87.85-.87 2.07 0 1.22.89 2.4 1.01 2.57.12.16 1.76 2.68 4.26 3.76.6.26 1.06.41 1.42.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.14-1.18-.06-.12-.22-.19-.47-.31z"/>
        </svg>
        <span class="whatsapp-tooltip">Discuter sur WhatsApp ⚡</span>
    </a>

    <!-- Back to Top Button -->
    <button class="back-to-top-btn" id="backToTopBtn" aria-label="Retourner en haut de page">
        <span>↑</span>
    </button>

    <!-- Scripts -->
    <script src="{{ asset('js/magic-code.js') }}" defer></script>
    <script src="{{ asset('js/magic-starfield.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
