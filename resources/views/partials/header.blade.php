<header class="site-header" id="siteHeader">
    <div class="container nav-wrap">
        <a class="brand" href="{{ route('home') }}" aria-label="Magic Code - Accueil">
            <img src="{{ asset('images/magic-code-logo.png') }}" alt="Logo Magic Code" width="56" height="56">
        </a>

        <nav class="desktop-nav" aria-label="Navigation principale">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" @if(request()->routeIs('home')) aria-current="page" @endif>
                Accueil
            </a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}" @if(request()->routeIs('services*')) aria-current="page" @endif>
                Services
            </a>
            <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}" @if(request()->routeIs('projects*')) aria-current="page" @endif>
                Projets
            </a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif>
                À propos
            </a>
            <a class="nav-cta {{ request()->routeIs('contact') ? 'active-cta' : '' }}" href="{{ route('contact') }}">
                Démarrer un projet <span>↗</span>
            </a>
        </nav>

        <button class="menu-toggle" id="menuToggle" aria-label="Ouvrir le menu de navigation" aria-expanded="false" aria-controls="mobileNav">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div class="mobile-nav" id="mobileNav" aria-hidden="true">
        <div class="container mobile-nav-inner">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">Services</a>
            <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}">Projets</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">À propos</a>
            <a href="{{ route('contact') }}" class="mobile-cta {{ request()->routeIs('contact') ? 'active' : '' }}">Démarrer un projet ↗</a>
        </div>
    </div>
</header>
