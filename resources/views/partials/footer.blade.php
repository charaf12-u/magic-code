<footer class="footer">
    <div class="container footer-grid">
        <div class="footer-col brand-col">
            <a class="brand footer-brand" href="{{ route('home') }}" aria-label="Magic Code">
                <img src="{{ asset('images/magic-code-logo.png') }}" alt="Logo Magic Code" width="56" height="56">
            </a>
            <p>
                We code the magic. Studio freelance digital spécialisé dans la conception de solutions web, mobiles, data et IA pensées pour le monde réel.
            </p>
            <div class="footer-badge">
                <span class="pulse-dot"></span> Disponible pour de nouveaux projets
            </div>
        </div>

        <div class="footer-col">
            <h4>Navigation</h4>
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('services') }}">Services</a>
            <a href="{{ route('projects') }}">Projets</a>
            <a href="{{ route('about') }}">À propos</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>

        <div class="footer-col">
            <h4>Expertises</h4>
            <a href="{{ route('services.show', 'web') }}">Web & Laravel</a>
            <a href="{{ route('services.show', 'mobile') }}">Applications Mobiles</a>
            <a href="{{ route('services.show', 'data') }}">Data Analytics & BI</a>
            <a href="{{ route('services.show', 'ai') }}">IA & Automatisation</a>
            <a href="{{ route('services.show', 'seo') }}">SEO & Performance</a>
            <a href="{{ route('services.show', 'design') }}">UI / UX & Design</a>
        </div>

        <div class="footer-col">
            <h4>Contact</h4>
            <a href="mailto:{{ config('contact.email') }}" class="footer-highlight">{{ config('contact.email') }}</a>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('contact.whatsapp')) }}" target="_blank" rel="noopener noreferrer">WhatsApp · {{ config('contact.phone') }}</a>
            <span>{{ config('contact.location') }}</span>
            <span class="work-hours">Lun – Ven : 09h00 – 19h00</span>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>© {{ date('Y') }} Magic Code. Tous droits réservés.</span>
        <div class="footer-legal-links">
            <a href="{{ route('privacy') }}">Confidentialité</a>
            <a href="{{ route('legal') }}">Mentions légales</a>
            <a href="{{ route('sitemap') }}" target="_blank">Sitemap XML</a>
        </div>
    </div>
</footer>
