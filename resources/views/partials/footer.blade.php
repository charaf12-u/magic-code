<footer class="footer">
    <div class="container footer-grid">
        <div class="footer-col brand-col">
            <a class="brand footer-brand" href="{{ route('home') }}" aria-label="Magic Code">
                <img src="{{ asset('images/magic-code-logo.png') }}" alt="Logo Magic Code" width="56" height="56">
            </a>
            <p class="footer-slogan">
                <strong>{{ __('site.slogan') }}</strong>
            </p>
            <p>
                {{ __('site.platform_presentation') }}
            </p>
            <div class="footer-badge">
                <span class="pulse-dot"></span> {{ __('site.available_badge') }}
            </div>
        </div>

        <div class="footer-col">
            <h4>{{ __('site.navigation_heading') }}</h4>
            <a href="{{ route('home') }}">{{ __('site.nav_home') }}</a>
            <a href="{{ route('services') }}">{{ __('site.nav_services') }}</a>
            <a href="{{ route('projects') }}">{{ __('site.nav_projects') }}</a>
            <a href="{{ route('about') }}">{{ __('site.nav_about') }}</a>
            <a href="{{ route('contact') }}">{{ __('site.nav_contact') }}</a>
        </div>

        <div class="footer-col">
            <h4>{{ __('site.expertises_heading') }}</h4>
            @foreach(\App\Repositories\ServiceRepository::all() as $srv)
                <a href="{{ route('services.show', $srv['slug']) }}">{{ $srv['title'] }}</a>
            @endforeach
        </div>

        <div class="footer-col">
            <h4>{{ __('site.contact_heading') }}</h4>
            <a href="mailto:{{ config('contact.email') }}" class="footer-highlight">{{ config('contact.email') }}</a>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('contact.whatsapp')) }}?text={{ rawurlencode(__('site.whatsapp_prefilled')) }}" target="_blank" rel="noopener noreferrer">WhatsApp · {{ config('contact.phone') }}</a>
            <span>{{ config('contact.location') }}</span>
            <span class="work-hours">{{ __('site.hours') }}</span>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>© {{ date('Y') }} Magic Code. {{ __('site.all_rights_reserved') }}</span>
        <div class="footer-legal-links">
            <a href="{{ route('privacy') }}">{{ __('site.privacy_policy') }}</a>
            <a href="{{ route('legal') }}">{{ __('site.legal_notice') }}</a>
            <a href="{{ route('sitemap') }}" target="_blank">{{ __('site.sitemap') }}</a>
        </div>
    </div>
</footer>
