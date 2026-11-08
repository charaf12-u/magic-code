@extends('layouts.app')

@section('content')
    <!-- Service Hero -->
    <section class="page-hero service-detail-hero">
        <div class="container">
            <a class="back-link" href="{{ route('services') }}">
                ← Retour à l'ensemble des services
            </a>
            <div class="eyebrow">
                Expertise {{ $service['number'] }} · {{ strtoupper($service['slug']) }}
            </div>
            <h1>{{ $service['title'] }}</h1>
            <p>{{ $service['lead'] }}</p>

            <div class="tag-row">
                @foreach($service['tech_stack'] as $tag)
                    <span>{{ $tag }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Service Content & Deliverables -->
    <section class="section">
        <div class="container two-col">
            <div>
                <div class="eyebrow">Ce que nous livrons</div>
                <h2>
                    Des livrables concrets pour <span class="green">votre croissance.</span>
                </h2>
                <p class="prose">
                    Chaque mission fait l'objet d'un cadrage précis, de jalons transparents et d'un code source audité et documenté prêt pour la production.
                </p>

                <div class="benefits-block">
                    <h3>Les points forts de notre accompagnement</h3>
                    <ul class="check-list">
                        @foreach($service['benefits'] as $benefit)
                            <li>{{ $benefit }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="feature-list large">
                @foreach($service['deliverables'] as $idx => $deliverable)
                    <div>
                        <b>{{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}</b>
                        <span>
                            <strong>Livrable clé</strong>
                            {{ $deliverable }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Other Services Suggestions -->
    @if(!empty($otherServices))
        <section class="section dark-band">
            <div class="container">
                <div class="section-head">
                    <div>
                        <div class="eyebrow">Explorer d'autres services</div>
                        <h2>Découvrez nos autres <span class="green">expertises complémentaires.</span></h2>
                    </div>
                </div>
                <div class="service-grid">
                    @foreach(array_slice($otherServices, 0, 3) as $other)
                        <a class="service-card" href="{{ route('services.show', $other['slug']) }}">
                            <div class="service-top">
                                <span>{{ $other['number'] }}</span>
                                <b>{{ $other['icon'] }}</b>
                            </div>
                            <h3>{{ $other['title'] }}</h3>
                            <p>{{ $other['short_description'] }}</p>
                            <span class="card-arrow" aria-hidden="true">↗</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">Parlons de votre projet</div>
                <h2>
                    Besoin de cette expertise<br>
                    <span class="green">pour votre entreprise ?</span>
                </h2>
                <p class="cta-desc">
                    Recevez une estimation claire des coûts, des délais et de l'architecture recommandée.
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                Demander un devis ↗
            </a>
        </div>
    </section>
@endsection
