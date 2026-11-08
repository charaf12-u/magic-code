@extends('layouts.app')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">Cadre Juridique</div>
            <h1>Mentions <span class="green">légales.</span></h1>
            <p>Informations éditoriales, mentions légales et conditions d'utilisation du site Magic Code.</p>
        </div>
    </section>

    <section class="section legal-content">
        <div class="container prose">
            <h2>1. Éditeur de la plateforme</h2>
            <p>
                Le site <strong>Magic Code</strong> (magic-code.ma) est édité par le studio indépendant d'ingénierie logicielle Magic Code, exerçant en tant qu'activité de services digitaux freelance basée à {{ config('contact.location') }}.
            </p>
            <p>
                <strong>Contact électronique :</strong> <a href="mailto:{{ config('contact.email') }}">{{ config('contact.email') }}</a><br>
                <strong>Téléphone / WhatsApp :</strong> {{ config('contact.phone') }}
            </p>

            <h2>2. Hébergement</h2>
            <p>
                Ce site web et ses services applicatifs sont hébergés sur des serveurs sécurisés conformes aux normes de sécurité internationales et européennes (SSL/TLS, ISO 27001).
            </p>

            <h2>3. Propriété intellectuelle</h2>
            <p>
                L'ensemble des contenus présents sur ce site (textes, graphismes, logos, icônes, illustrations, code source des démonstrations et agencements) relève de la législation marocaine et internationale sur le droit d'auteur et la propriété intellectuelle.
            </p>
            <p>
                Toute reproduction, représentation, modification ou diffusion, totale ou partielle, sans l'accord préalable écrit de Magic Code est strictement interdite.
            </p>

            <h2>4. Responsabilité & Liens externes</h2>
            <p>
                Magic Code met tout en œuvre pour offrir des informations exactes et actualisées. Toutefois, Magic Code ne saurait être tenu responsable des omissions, inexactitudes ou carences dans la mise à jour, qu'elles soient de son fait ou du fait de tiers partenaires.
            </p>
        </div>
    </section>
@endsection
