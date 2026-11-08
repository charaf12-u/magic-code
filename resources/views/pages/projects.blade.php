@extends('layouts.app')

@section('content')
    <!-- Projects Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">Portfolio & Études de Cas · Magic Code</div>
            <h1>
                Des produits digitaux <span class="green">conçus pour impacter.</span>
            </h1>
            <p>
                Web, applications mobiles, ingénierie de données et automatisation : découvrez comment nous transformons des problématiques complexes en solutions élégantes, performantes et pérennes.
            </p>
        </div>
    </section>

    <!-- Projects List -->
    <section class="section">
        <div class="container filter-container">
            <div class="filter-bar">
                <button class="filter-btn active" type="button" data-filter="all">Tous les projets ({{ count($projects) }})</button>
                <button class="filter-btn" type="button" data-filter="web">Web & Laravel</button>
                <button class="filter-btn" type="button" data-filter="data">Data Engineering & Analytics</button>
                <button class="filter-btn" type="button" data-filter="mobile">Applications Mobiles</button>
            </div>
        </div>

        <div class="container project-list">
            @foreach($projects as $p)
                <a class="portfolio-item reveal"
                   href="{{ route('projects.show', $p['slug']) }}"
                   data-category="{{ $p['slug'] === 'lotti' ? 'web' : ($p['slug'] === 'ridemate' ? 'mobile' : 'data') }}"
                >
                    <div class="portfolio-index">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-cat">{{ $p['category'] }}</span>
                        <h2>{{ $p['title'] }}</h2>
                        <p>{{ $p['short_description'] }}</p>
                        <div class="tech-tags-inline">
                            @foreach($p['tags'] as $tag)
                                <span class="tech-pill">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="portfolio-thumb">
                        <img src="{{ asset($p['image']) }}" alt="{{ $p['title'] }} aperçu" loading="lazy">
                    </div>
                    <b class="portfolio-arrow" aria-hidden="true">↗</b>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">Prêt pour votre prochain succès ?</div>
                <h2>
                    Vous avez une idée de produit<br>
                    <span class="green">ou un besoin technique ?</span>
                </h2>
                <p class="cta-desc">
                    Nous vous accompagnons du cadrage initial jusqu'au lancement en production.
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                Lancer mon projet ↗
            </a>
        </div>
    </section>
@endsection
