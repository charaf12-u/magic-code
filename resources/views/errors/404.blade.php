@extends('layouts.app')

@section('content')
    <section class="section error-page">
        <div class="container error-wrap">
            <div class="error-code">404</div>
            <div class="eyebrow">Erreur 404 · Page introuvable</div>
            <h1>Oups ! Cette page s'est <span class="green">volatilisée.</span></h1>
            <p class="prose">
                La ressource que vous recherchez n'existe pas ou a été déplacée. Pas d'inquiétude, le reste du studio reste pleinement fonctionnel.
            </p>
            <div class="error-actions">
                <a class="btn btn-primary" href="{{ route('home') }}">
                    ← Retour à l'accueil
                </a>
                <a class="btn btn-ghost" href="{{ route('projects') }}">
                    Voir nos projets
                </a>
            </div>
        </div>
    </section>
@endsection

