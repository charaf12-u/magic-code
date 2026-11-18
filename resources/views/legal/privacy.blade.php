@extends('layouts.app')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">{{ __('site.privacy_page_eyebrow') }}</div>
            <h1>{{ __('site.privacy_page_title') }} <span class="green">{{ __('site.privacy_page_title_highlight') }}</span></h1>
            <p>{{ __('site.privacy_page_desc') }}</p>
        </div>
    </section>

    <section class="section legal-content">
        <div class="container prose">
            <h2>1. Préambule et engagement</h2>
            <p>
                Chez Magic Code, le respect de la vie privée et la sécurité de vos informations personnelles sont des priorités fondamentales. Cette politique décrit la manière dont nous traitons les données recueillies via notre formulaire de contact et nos canaux digitaux, conformément à la loi n° 09-08 relative à la protection des personnes physiques à l'égard du traitement des données à caractère personnel (CNDP au Maroc) et aux standards du RGPD.
            </p>

            <h2>2. Données collectées</h2>
            <p>
                Lorsque vous nous contactez, nous collectons uniquement les données strictement nécessaires au traitement de votre demande de devis ou de collaboration technique :
            </p>
            <ul class="check-list">
                <li>Nom et prénom de l'interlocuteur</li>
                <li>Adresse email professionnelle ou personnelle</li>
                <li>Nature du service ou du projet sélectionné</li>
                <li>Détails textuels du message et informations transmises spontanément</li>
                <li>Adresse IP anonymisée à des fins de sécurité contre le spam</li>
            </ul>

            <h2>3. Finalité du traitement</h2>
            <p>
                Les informations recueillies sont enregistrées dans un fichier informatisé et utilisées uniquement pour :
            </p>
            <ul>
                <li>Vous répondre et échanger sur votre cahier des charges</li>
                <li>Établir des propositions techniques et financières (devis)</li>
                <li>Assurer le suivi de la relation professionnelle en cours de projet</li>
            </ul>
            <p>
                <strong>Vos données ne sont jamais vendues, louées ou cédées à des tiers à des fins publicitaires.</strong>
            </p>

            <h2>4. Durée de conservation</h2>
            <p>
                Vos informations sont conservées pour une durée n'excédant pas celle nécessaire aux finalités pour lesquelles elles ont été collectées, généralement 3 ans après le dernier échange sans concrétisation commerciale, ou pour la durée légale applicable en cas de relation contractuelle.
            </p>

            <h2>5. Vos droits d'accès et de rectification</h2>
            <p>
                Vous bénéficiez d'un droit d'accès, de rectification, de portabilité et de suppression des données qui vous concernent. Pour exercer ces droits ou pour toute question relative au traitement de vos données personnelles, vous pouvez nous écrire à :
            </p>
            <p>
                <a href="mailto:{{ config('contact.email') }}">{{ config('contact.email') }}</a>
            </p>
        </div>
    </section>
@endsection
