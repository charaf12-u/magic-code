@extends('layouts.app')

@section('content')
    <!-- About Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">À propos · Magic Code</div>
            <h1>
                Le code est notre outil.<br>
                <span class="green">Le résultat business est notre objectif.</span>
            </h1>
            <p>
                Magic Code est un studio digital freelance basé au Maroc, dédié à la création d'architectures web robustes, d'applications mobiles intuitives et de pipelines de données fiables.
            </p>
        </div>
    </section>

    <!-- About Philosophy -->
    <section class="section">
        <div class="container about-grid">
            <div>
                <div class="eyebrow">Notre philosophie</div>
                <h2>
                    Simple à utiliser.<br>
                    <span class="green">Inébranlable à l'intérieur.</span>
                </h2>
                <div class="quote-card">
                    <p>« La simplicité n'est pas le manque de complexité : c'est le triomphe sur la complexité. »</p>
                </div>
            </div>
            <div class="prose">
                <p>
                    Nous croyons qu'un bon produit digital doit avant tout être compréhensible, rapide et immédiatement utile avant d'être compliqué. Chaque ligne de code et chaque choix d'infrastructure doit répondre à un objectif métier clair et offrir une expérience utilisateur irréprochable.
                </p>
                <p>
                    Du cadrage initial au produit prêt pour des millions de requêtes, nous travaillons avec une méthodologie pragmatique et transparente : comprendre, concevoir, développer, tester et optimiser en continu.
                </p>
                <ul class="check-list">
                    <li>Zéro superflu : chaque fonctionnalité a une raison d'être</li>
                    <li>Code propriétaire, maintenable et 100% documenté</li>
                    <li>Communication directe sans intermédiaires inutiles</li>
                    <li>Accompagnement après livraison et transfert de compétences</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Stats Band -->
    <section class="section dark-band">
        <div class="container stats">
            <div>
                <strong>6+</strong>
                <span>Pôles d'expertise digitale</span>
            </div>
            <div>
                <strong>100%</strong>
                <span>Solutions conçues sur mesure</span>
            </div>
            <div>
                <strong>&lt; 1s</strong>
                <span>Objectif de vitesse de chargement</span>
            </div>
            <div>
                <strong>MA</strong>
                <span>Basé au Maroc · Partenaires dans le monde</span>
            </div>
        </div>
    </section>

    <!-- Values Grid -->
    <section class="section">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">Nos valeurs</div>
                    <h2>Ce qui guide <span class="green">notre travail au quotidien.</span></h2>
                </div>
            </div>

            <div class="process-grid">
                <div>
                    <span>01</span>
                    <h3>Rigueur Technique</h3>
                    <p>Respect scrupuleux des bonnes pratiques de l'industrie, typage strict, tests automatisés et architectures découplées.</p>
                </div>
                <div>
                    <span>02</span>
                    <h3>Transparence Totale</h3>
                    <p>Accès au code source en continu, rapports d'avancement réguliers et devis détaillés sans frais cachés.</p>
                </div>
                <div>
                    <span>03</span>
                    <h3>Focus Performance</h3>
                    <p>Optimisation des requêtes SQL, mise en cache intelligente, minification des assets et hébergement dimensionné au plus juste.</p>
                </div>
                <div>
                    <span>04</span>
                    <h3>Vision Long Terme</h3>
                    <p>Nous construisons des applications faites pour durer, évoluer et accueillir de futures fonctionnalités sans devoir tout réécrire.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">Rencontrons-nous</div>
                <h2>
                    Envie de collaborer<br>
                    <span class="green">sur votre futur produit ?</span>
                </h2>
                <p class="cta-desc">
                    Discutons de vos besoins techniques lors d'un appel ou par message.
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                Prendre contact ↗
            </a>
        </div>
    </section>
@endsection
