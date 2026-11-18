@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero section">
        <div class="container hero-grid">
            <div class="hero-copy reveal">
                <div class="eyebrow">
                    <span class="pulse"></span> DISPONIBLE POUR NOUVEAUX PROJETS · MAROC & INTERNATIONAL
                </div>
                <h1>
                    Nous concevons des produits digitaux d'exception qui <span class="green">accélèrent votre croissance.</span>
                </h1>
                <p class="hero-lead">
                    Studio digital indépendant spécialisé en ingénierie web moderne, applications mobiles haute performance et intégration IA. De l'architecture technique au déploiement sécurisé, nous transformons vos ambitions en réalité.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                        Démarrer un projet <span>↗</span>
                    </a>
                    <a class="btn btn-ghost btn-big" href="{{ route('projects') }}">
                        Explorer nos réalisations
                    </a>
                </div>
                <div class="trust-row">
                    <span><b class="check" style="color: var(--status-green);">✓</b> Cession 100% code propriétaire</span>
                    <span><b class="check" style="color: var(--status-green);">✓</b> Architecture scalable & sécurisée</span>
                    <span><b class="check" style="color: var(--status-green);">✓</b> Accompagnement direct sur WhatsApp</span>
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

    <!-- Impact Metrics Band -->
    <section class="section dark-band" style="padding: 44px 0;">
        <div class="container stats">
            <div>
                <strong>4 Semaines</strong>
                <span>Délai moyen de livraison MVP</span>
            </div>
            <div>
                <strong>99.9%</strong>
                <span>Disponibilité & Uptime serveurs</span>
            </div>
            <div>
                <strong>100%</strong>
                <span>Code audité & sans dette technique</span>
            </div>
            <div>
                <strong>5.0 ★</strong>
                <span>Satisfaction client certifiée</span>
            </div>
        </div>
    </section>

    <!-- Ticker Banner -->
    <section class="ticker" aria-hidden="true">
        <div>
            <span>LARAVEL 11</span> <i>✦</i>
            <span>MOBILE APPS</span> <i>✦</i>
            <span>DATA ENGINEERING</span> <i>✦</i>
            <span>AI AGENTS & LLMs</span> <i>✦</i>
            <span>BUSINESS AUTOMATION</span> <i>✦</i>
            <span>TECHNICAL SEO</span> <i>✦</i>
            <span>LARAVEL 11</span> <i>✦</i>
            <span>MOBILE APPS</span> <i>✦</i>
            <span>DATA ENGINEERING</span> <i>✦</i>
            <span>AI AGENTS & LLMs</span> <i>✦</i>
            <span>BUSINESS AUTOMATION</span> <i>✦</i>
            <span>TECHNICAL SEO</span> <i>✦</i>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="section services-preview" id="services">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">01 · EXPERTISES & SOLUTIONS</div>
                    <h2>Une maîtrise technique complète pour <span class="green">vos défis les plus ambitieux.</span></h2>
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
                <div class="eyebrow">02 · ENGAGEMENTS & MÉTHODE</div>
                <h2>
                    Pourquoi les entreprises exigeantes<br>
                    <span class="green">choisissent Magic Code.</span>
                </h2>
                <p class="section-subtext">
                    Pas de buzzwords ni d'intermédiaires inutiles : une équipe d'ingénieurs passionnés dédiée à la réussite mesurable et à la pérennité technique de votre produit.
                </p>
            </div>
            <div class="feature-list">
                <div>
                    <b>01</b>
                    <div>
                        <strong>Architecture Évolutive & Sécurité</strong>
                        <span>Base de code modulaire Laravel, typage rigoureux, API REST/GraphQL et couverture de tests automatisés.</span>
                    </div>
                </div>
                <div>
                    <b>02</b>
                    <div>
                        <strong>Haute Performance & SEO Natif</strong>
                        <span>Temps de chargement inférieurs à 1 seconde, optimisation Core Web Vitals et indexation technique irréprochable.</span>
                    </div>
                </div>
                <div>
                    <b>03</b>
                    <div>
                        <strong>Communication Directe & Suivi Hebdomadaire</strong>
                        <span>Accès direct aux développeurs seniors via groupe dédié WhatsApp & Slack, points de sprint réguliers et transparence totale.</span>
                    </div>
                </div>
                <div>
                    <b>04</b>
                    <div>
                        <strong>Mesure d'Impact & ROI Garanti</strong>
                        <span>Intégration d'outils d'analytics temps réel et d'indicateurs de performance clés dès la phase de conception.</span>
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
                    <div class="eyebrow">03 · RÉALISATIONS SÉLECTIONNÉES</div>
                    <h2>Des projets concrets qui <span class="green">démontrent notre exigence.</span></h2>
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
                    <div class="eyebrow">04 · NOTRE MÉTHODOLOGIE</div>
                    <h2>Un processus transparent, <span class="green">du cadrage à la mise en production.</span></h2>
                </div>
            </div>

            <div class="process-grid">
                <div>
                    <span>01</span>
                    <h3>Immersion & Cadrage</h3>
                    <p>Audit approfondi de vos besoins métier, modélisation des flux utilisateurs et spécifications techniques sans ambiguïté.</p>
                </div>
                <div>
                    <span>02</span>
                    <h3>Architecture & UX</h3>
                    <p>Design de l'interface utilisateur sur mesure, schéma relationnel de données et validation des maquettes interactives.</p>
                </div>
                <div>
                    <span>03</span>
                    <h3>Développement Itératif</h3>
                    <p>Développement par sprints courts, revues de code systématiques et environnement de pré-production accessible en direct.</p>
                </div>
                <div>
                    <span>04</span>
                    <h3>Déploiement & Garantie</h3>
                    <p>Mise en production sécurisée, configuration CDN/SSL, formation de vos équipes et 30 jours de garantie corrective inclus.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials / Social Proof -->
    <section class="section dark-band">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">05 · TÉMOIGNAGES CLIENTS</div>
                    <h2>Ce que disent <span class="green">nos partenaires.</span></h2>
                </div>
                <div class="rating-badge">
                    <span class="stars">★★★★★</span>
                    <b>5.0 / 5.0 · Satisfaction client certifiée</b>
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
                <div class="eyebrow">06 · QUESTIONS FRÉQUENTES</div>
                <h2>Tout ce que vous devez <span class="green">savoir avant de démarrer.</span></h2>
                <p class="prose">
                    Vous avez un projet spécifique avec des contraintes techniques particulières ? Échangeons directement sur WhatsApp ou par email pour un cadrage sur mesure.
                </p>
                <a class="btn btn-ghost" href="{{ route('contact') }}">
                    Poser une question spécifique ↗
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
                <div class="eyebrow">07 · NOUVEAU PROJET</div>
                <h2>
                    Votre prochaine idée mérite<br>
                    <span class="green">une réalisation d'exception.</span>
                </h2>
                <p class="cta-desc">
                    Échangeons dès aujourd'hui sur votre vision et recevez une proposition technique et tarifaire sous 24 heures ouvrées.
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                Démarrer mon projet ↗
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
