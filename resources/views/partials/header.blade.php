<header class="site-header" id="siteHeader">
    <div class="container nav-wrap">
        <a class="brand" href="{{ route('home') }}" aria-label="Magic Code - {{ __('site.nav_home') }}">
            <img src="{{ asset('images/magic-code-logo.png') }}" alt="Logo Magic Code" width="56" height="56">
        </a>

        @php
            $currentLocale = app()->getLocale();
            if ($currentLocale === 'zgh') $currentLocale = 'tamazight';
        @endphp

        <nav class="desktop-nav" aria-label="{{ __('site.menu_toggle') }}">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" @if(request()->routeIs('home')) aria-current="page" @endif>
                {{ __('site.nav_home') }}
            </a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}" @if(request()->routeIs('services*')) aria-current="page" @endif>
                {{ __('site.nav_services') }}
            </a>
            <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}" @if(request()->routeIs('projects*')) aria-current="page" @endif>
                {{ __('site.nav_projects') }}
            </a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif>
                {{ __('site.nav_about') }}
            </a>

            <!-- Language Switcher Desktop -->
            <div class="lang-switcher" aria-label="Language selector">
                <a href="{{ route('lang.switch', 'en') }}" class="lang-btn {{ $currentLocale === 'en' ? 'active' : '' }}" title="English">EN</a>
                <span class="lang-sep">·</span>
                <a href="{{ route('lang.switch', 'fr') }}" class="lang-btn {{ $currentLocale === 'fr' ? 'active' : '' }}" title="Français">FR</a>
                <span class="lang-sep">·</span>
                <a href="{{ route('lang.switch', 'ar') }}" class="lang-btn {{ $currentLocale === 'ar' ? 'active' : '' }}" title="العربية">AR</a>
                <span class="lang-sep">·</span>
                <a href="{{ route('lang.switch', 'tamazight') }}" class="lang-btn {{ $currentLocale === 'tamazight' ? 'active' : '' }}" title="ⵜⴰⵎⴰⵣⵉⵖⵜ">ⵜⴰⵎ</a>
            </div>

            <a class="nav-cta {{ request()->routeIs('contact') ? 'active-cta' : '' }}" href="{{ route('contact') }}">
                {{ __('site.nav_cta') }} <span>{{ app()->getLocale() === 'ar' ? '↖' : '↗' }}</span>
            </a>
        </nav>

        <button class="menu-toggle" id="menuToggle" aria-label="{{ __('site.menu_toggle') }}" aria-expanded="false" aria-controls="mobileNav">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div class="mobile-nav" id="mobileNav" aria-hidden="true">
        <div class="container mobile-nav-inner">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('site.nav_home') }}</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">{{ __('site.nav_services') }}</a>
            <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}">{{ __('site.nav_projects') }}</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ __('site.nav_about') }}</a>

            <div class="mobile-lang-switcher">
                <a href="{{ route('lang.switch', 'en') }}" class="mobile-lang-btn {{ $currentLocale === 'en' ? 'active' : '' }}">English</a>
                <a href="{{ route('lang.switch', 'fr') }}" class="mobile-lang-btn {{ $currentLocale === 'fr' ? 'active' : '' }}">Français</a>
                <a href="{{ route('lang.switch', 'ar') }}" class="mobile-lang-btn {{ $currentLocale === 'ar' ? 'active' : '' }}">العربية</a>
                <a href="{{ route('lang.switch', 'tamazight') }}" class="mobile-lang-btn {{ $currentLocale === 'tamazight' ? 'active' : '' }}">ⵜⴰⵎⴰⵣⵉⵖⵜ</a>
            </div>

            <a href="{{ route('contact') }}" class="mobile-cta {{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('site.nav_cta') }} {{ app()->getLocale() === 'ar' ? '↖' : '↗' }}</a>
        </div>
    </div>
</header>
