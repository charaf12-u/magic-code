@extends('layouts.app')

@section('content')
    <!-- Services Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">Services & Expertises · Magic Code</div>
            <h1>
                Une équipe experte pour <span class="green">concevoir, développer</span> et automatiser.
            </h1>
            <p>
                Du premier prototype à la plateforme scalant auprès de milliers d'utilisateurs, nous mettons l'ingénierie logicielle et la rigueur technique au service de vos ambitions.
            </p>
        </div>
    </section>

    <!-- Services Detailed List -->
    <section class="section">
        <div class="container service-list">
            @foreach($services as $s)
                <a class="service-row reveal" href="{{ route('services.show', $s['slug']) }}">
                    <div class="service-number">{{ $s['number'] }}</div>
                    <div>
                        <h2>{{ $s['title'] }}</h2>
                        <p>{{ $s['short_description'] }}</p>
                        <div class="tech-tags-inline">
                            @foreach($s['tech_stack'] as $tech)
                                <span class="tech-pill">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                    <span class="row-arrow" aria-hidden="true">↗</span>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">Prêt à collaborer ?</div>
                <h2>
                    Un besoin spécifique<br>
                    <span class="green">ou un projet sur mesure ?</span>
                </h2>
                <p class="cta-desc">
                    Discutons de vos enjeux et construisons la solution technique la plus adaptée à vos objectifs.
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                Demander un devis gratuit ↗
            </a>
        </div>
    </section>
@endsection
