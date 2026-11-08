@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero section">
        <div class="container hero-grid">
            <div class="hero-copy reveal">
                <div class="eyebrow">
                    <span class="pulse"></span> Freelance Digital Studio · Maroc
                </div>
                <h1>
                    On transforme vos idées en <span class="green">expériences digitales.</span>
                </h1>
                <p class="hero-lead">
                    Sites web sur mesure, applications mobiles, data analytics et automatisation intelligente. Une expertise technique de bout en bout pour concevoir, bâtir et propulser vos projets.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="{{ route('contact') }}">
                        Démarrer un projet <span>↗</span>
                    </a>
                    <a class="btn btn-ghost" href="{{ route('projects') }}">
                        Explorer le portfolio
                    </a>
                </div>
                <div class="trust-row">
                    <span>✓ Code propre & documenté</span>
                    <span>✓ Performance & SEO natif</span>
                    <span>✓ Accompagnement agile</span>
                </div>
            </div>

            <div class="hero-art reveal delay-1">
                <div class="orb"></div>
                <img src="{{ asset('images/magic-wand-hero.png') }}" alt="Magic Code - baguette magique et code digital" width="620" height="620" loading="eager">
                <div class="code-float">
                    &lt;code /&gt;<br>
                    <b>ideas → reality</b>
                </div>
            </div>
        </div>
    </section>

    <!-- Ticker Banner -->
    <section class="ticker" aria-hidden="true">
        <div>
            <span>LARAVEL</span> <i>✦</i>
            <span>MOBILE APPS</span> <i>✦</i>
            <span>DATA ENGINEERING</span> <i>✦</i>
            <span>AI & LLMs</span> <i>✦</i>
            <span>AUTOMATION</span> <i>✦</i>
            <span>SEO OPTIMIZATION</span> <i>✦</i>
            <span>LARAVEL</span> <i>✦</i>
            <span>MOBILE APPS</span> <i>✦</i>
            <span>DATA ENGINEERING</span> <i>✦</i>
            <span>AI & LLMs</span> <i>✦</i>
            <span>AUTOMATION</span> <i>✦</i>
            <span>SEO OPTIMIZATION</span> <i>✦</i>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="section services-preview" id="services">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">01 · Nos expertises</div>
                    <h2>Tout ce qu'il faut pour <span class="green">passer au digital.</span></h2>
                </div>
                <a class="text-link" href="{{ route('services') }}">
                    Toutes nos expertises ↗
                </a>
            </div>

            <div class="service-grid">
                @foreach($featuredServices as $service)
                    <a class="service-card reveal" href="{{ route('services.show', $service['slug']) }}">
                        <div class="service-top">
                            <span>{{ $service['number'] }}</span>
                            <b>{{ $service['icon'] }}</b>
                        </div>
                        <h3>{{ $service['title'] }}</h3>
                        <p>{{ $service['short_description'] }}</p>
                        <span class="card-arrow" aria-hidden="true">↗</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Magic Code Section -->
    <section class="section dark-band">
        <div class="container two-col">
            <div>
                <div class="eyebrow">02 · Pourquoi Magic Code</div>
                <h2>
                    Pas juste du code.<br>
                    <span class="green">Une vraie solution métier.</span>
                </h2>
                <p class="section-subtext">
                    Nous ne nous contentons pas d'aligner des lignes de code : nous concevons des produits fiables, maintenables et orientés résultats pour votre business.
                </p>
            </div>
            <div class="feature-list">
                <div>
                    <b>01</b>
                    <div>
                        <strong>Simple & Intuitif</strong>
                        <span>Des interfaces épurées et sans friction que vos utilisateurs adoptent immédiatement.</span>
                    </div>
                </div>
                <div>
                    <b>02</b>
                    <div>
                        <strong>Haute Performance</strong>
                        <span>Des temps de chargement éclair, un code optimisé et des architectures scalables.</span>
                    </div>
                </div>
                <div>
                    <b>03</b>
                    <div>
                        <strong>Architecture Propre</strong>
                        <span>Une base de code modulaire et documentée, facile à faire grandir avec votre activité.</span>
                    </div>
                </div>
                <div>
                    <b>04</b>
                    <div>
                        <strong>Mesurable & ROI</strong>
                        <span>Suivi précis des métriques, télémétrie et analytics intégrés dès la conception.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Preview -->
    <section class="section projects-preview" id="projects">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">03 · Réalisations</div>
                    <h2>Des projets qui <span class="green">font la différence.</span></h2>
                </div>
                <a class="text-link" href="{{ route('projects') }}">
                    Explorer tout le portfolio ↗
                </a>
            </div>

            <div class="project-grid">
                @foreach($featuredProjects as $p)
                    <a class="project-card {{ $p['color_theme'] }} reveal" href="{{ route('projects.show', $p['slug']) }}">
                        <div class="project-card-header">
                            <span>{{ $p['category'] }}</span>
                            <h3>{{ $p['title'] }}</h3>
                            <p>{{ $p['short_description'] }}</p>
                        </div>
                        <div class="project-card-visual">
                            <img src="{{ asset($p['image']) }}" alt="{{ $p['title'] }} interface" loading="lazy">
                        </div>
                        <div class="project-mark" aria-hidden="true">{{ $p['badge'] }}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Methodology / Process -->
    <section class="section process">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">04 · Notre méthode</div>
                    <h2>De l'idée au <span class="green">produit en production.</span></h2>
                </div>
            </div>

            <div class="process-grid">
                <div>
                    <span>01</span>
                    <h3>Comprendre</h3>
                    <p>Immersion dans vos objectifs métier, vos utilisateurs cibles, vos flux et vos contraintes techniques.</p>
                </div>
                <div>
                    <span>02</span>
                    <h3>Concevoir</h3>
                    <p>Définition de l'UX, architecture technique, modélisation de base de données et validation du périmètre.</p>
                </div>
                <div>
                    <span>03</span>
                    <h3>Construire</h3>
                    <p>Développement itératif, revues de code, tests unitaires et intégration continue sans compromis.</p>
                </div>
                <div>
                    <span>04</span>
                    <h3>Déployer & Scaler</h3>
                    <p>Mise en production, monitoring, optimisation SEO, tracking analytics et accompagnement post-lancement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials / Social Proof -->
    <section class="section dark-band">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">05 · Retours d'expérience</div>
                    <h2>Ce que disent <span class="green">nos partenaires.</span></h2>
                </div>
                <div class="rating-badge">
                    <span class="stars">★★★★★</span>
                    <b>5.0 / 5.0 · Satisfaction client</b>
                </div>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card reveal">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        « Magic Code a compris nos besoins fonciers en quelques heures. La plateforme Lotti.ma tourne à une vitesse impressionnante et nos promoteurs adorent la cartographie. »
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">ML</div>
                        <div>
                            <strong>Mehdi L.</strong>
                            <span>Fondateur · Plateforme Immobilière</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card reveal delay-1">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        « La rigueur technique sur notre pipeline Big Data nous a fait gagner des semaines d'ingénierie. Idempotence, tests dbt et disponibilité 99.9% au rendez-vous. »
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">ST</div>
                        <div>
                            <strong>Sara T.</strong>
                            <span>Lead Data Engineer · FinTech</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card reveal delay-2">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        « Rarement vu un studio aussi réactif et pragmatique. Aucun blabla inutile : code propre, respect des délais et accompagnement sans faille sur WhatsApp. »
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">YM</div>
                        <div>
                            <strong>Yassine M.</strong>
                            <span>CTO · Startup Mobilité Urbaine</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion -->
    <section class="section faq-section" id="faq">
        <div class="container faq-grid-wrap">
            <div class="faq-head">
                <div class="eyebrow">06 · Foire aux questions</div>
                <h2>Tout ce que vous devez <span class="green">savoir avant de démarrer.</span></h2>
                <p class="prose">
                    Vous avez une question spécifique qui n'est pas listée ici ? Contactez-nous directement via WhatsApp ou formulaire.
                </p>
                <a class="btn btn-ghost" href="{{ route('contact') }}">
                    Poser une autre question ↗
                </a>
            </div>

            <div class="faq-accordion">
                <div class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>Combien de temps prend la conception d'un projet ?</span>
                        <b class="faq-icon" aria-hidden="true">+</b>
                    </button>
                    <div class="faq-answer">
                        <p>
                            Un projet type MVP ou site sur mesure prend généralement entre <strong>2 à 4 semaines</strong>. Pour des architectures plus complexes (plateformes complètes, pipelines Big Data ou applications mobiles natives), comptez de <strong>4 à 8 semaines</strong> avec des livraisons intermédiaires hebdomadaires.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>Comment s'organisent la communication et le suivi technique ?</span>
                        <b class="faq-icon" aria-hidden="true">+</b>
                    </button>
                    <div class="faq-answer">
                        <p>
                            Nous privilégions une communication directe sans intermédiaire via un groupe dédié (WhatsApp / Slack), un suivi hebdomadaire en visio et un accès complet à l'environnement de pré-production et au dépôt Git pour une transparence totale.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>Quelles sont les modalités de paiement et devis ?</span>
                        <b class="faq-icon" aria-hidden="true">+</b>
                    </button>
                    <div class="faq-answer">
                        <p>
                            Chaque prestation fait l'objet d'un devis détaillé et d'un contrat clair. Le règlement s'effectue généralement en plusieurs tranches : un acompte au lancement (30% à 40%), un jalon intermédiaire et le solde à la validation finale avant mise en production.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>Proposez-vous une garantie et maintenance après la livraison ?</span>
                        <b class="faq-icon" aria-hidden="true">+</b>
                    </button>
                    <div class="faq-answer">
                        <p>
                            Absolument. Tous nos développements incluent une garantie corrective de <strong>30 jours</strong> après mise en production. Par la suite, nous proposons des forfaits d'infogérance et d'évolution mensuelle adaptés à vos besoins.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">07 · Let's build together</div>
                <h2>
                    Votre prochaine idée mérite<br>
                    <span class="green">une réalisation d'exception.</span>
                </h2>
                <p class="cta-desc">
                    Vous avez un projet en tête ou un besoin d'automatisation ? Échangeons dès aujourd'hui.
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                Parler de mon projet ↗
            </a>
        </div>
    </section>
@endsection

@push('head')
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'Magic Code',
        'url' => url('/'),
        'logo' => asset('images/magic-code-logo.png'),
        'description' => 'Studio digital freelance au Maroc spécialisé en développement web Laravel, applications mobiles, data engineering et intelligence artificielle.',
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Morocco',
        ],
        'knowsAbout' => [
            'Web Development',
            'Laravel Framework',
            'Mobile App Development',
            'Data Analytics',
            'Artificial Intelligence',
            'Process Automation',
            'Technical SEO',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush
