@extends('layouts.app')

@section('content')
    <!-- Contact Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">Contact & Devis · Magic Code</div>
            <h1>
                Parlons de votre <span class="green">futur projet.</span>
            </h1>
            <p>
                Décrivez-nous votre vision, vos besoins techniques ou vos défis d'automatisation. Nous vous aidons à cadrer la meilleure solution technique et vous transmettons une estimation claire.
            </p>
        </div>
    </section>

    <!-- Contact Grid -->
    <section class="section">
        <div class="container contact-grid">
            <!-- Contact Informations -->
            <div class="contact-info">
                <div class="eyebrow">Canaux directs</div>
                <h2>
                    Une question urgente ?<br>
                    <span class="green">Contactez-nous directement.</span>
                </h2>

                <div class="contact-channels">
                    <a class="contact-card" href="mailto:{{ config('contact.email') }}">
                        <span class="channel-icon">✉</span>
                        <div>
                            <strong>Email direct</strong>
                            <span>{{ config('contact.email') }}</span>
                        </div>
                    </a>

                    <a class="contact-card" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('contact.whatsapp')) }}" target="_blank" rel="noopener noreferrer">
                        <span class="channel-icon">💬</span>
                        <div>
                            <strong>WhatsApp Business</strong>
                            <span>{{ config('contact.phone') }}</span>
                        </div>
                    </a>

                    <div class="contact-card static-card">
                        <span class="channel-icon">📍</span>
                        <div>
                            <strong>Localisation</strong>
                            <span>{{ config('contact.location') }}</span>
                        </div>
                    </div>
                </div>

                <div class="mini-note">
                    <p>⚡ <strong>Délai de réponse :</strong> Nous répondons à toutes les demandes sous 24 à 48 heures ouvrées avec un premier avis technique gratuit.</p>
                </div>
            </div>

            <!-- Contact Form Card -->
            <div class="form-card">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>✓ Message transmis avec succès !</strong>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error" role="alert">
                        <strong>⚠ Erreur lors de l'envoi</strong>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error" role="alert">
                        <strong>⚠ Veuillez corriger les erreurs ci-dessous :</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" novalidate>
                    @csrf

                    <div class="form-grid">
                        <label for="contact-name">
                            Nom & Prénom <span class="required">*</span>
                            <input
                                id="contact-name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                placeholder="ex. Mehdi Alaoui"
                                class="@error('name') input-error @enderror"
                            >
                            @error('name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <label for="contact-email">
                            Adresse Email <span class="required">*</span>
                            <input
                                id="contact-email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="ex. mehdi@entreprise.ma"
                                class="@error('email') input-error @enderror"
                            >
                            @error('email')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <label for="contact-service">
                        Domaine d'expertise souhaité
                        <select id="contact-service" name="service">
                            <option value="">Sélectionnez un service (optionnel)</option>
                            <option value="Web & Laravel" {{ old('service') == 'Web & Laravel' ? 'selected' : '' }}>Web & Plateformes Laravel</option>
                            <option value="Applications mobiles" {{ old('service') == 'Applications mobiles' ? 'selected' : '' }}>Applications Mobiles (Android / Flutter)</option>
                            <option value="Data Analytics & BI" {{ old('service') == 'Data Analytics & BI' ? 'selected' : '' }}>Data Analytics, ETL & BI</option>
                            <option value="IA & Automatisation" {{ old('service') == 'IA & Automatisation' ? 'selected' : '' }}>IA, RAG & Automatisation</option>
                            <option value="SEO & Performance" {{ old('service') == 'SEO & Performance' ? 'selected' : '' }}>SEO Technique & Performance</option>
                            <option value="UI/UX & Design" {{ old('service') == 'UI/UX & Design' ? 'selected' : '' }}>UI/UX & Design Graphique</option>
                            <option value="Autre demande" {{ old('service') == 'Autre demande' ? 'selected' : '' }}>Autre demande sur mesure</option>
                        </select>
                        @error('service')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label for="contact-message">
                        Description de votre projet ou besoin <span class="required">*</span>
                        <textarea
                            id="contact-message"
                            name="message"
                            rows="6"
                            required
                            placeholder="Décrivez votre idée, le contexte métier, les objectifs attendus, ainsi qu'un ordre de grandeur de vos délais et budget indicatif..."
                            class="@error('message') input-error @enderror"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </label>

                    <button class="btn btn-primary btn-block" type="submit">
                        Envoyer ma demande via WhatsApp <span>↗</span>
                    </button>
                    <p class="form-hint">
                        💬 En cliquant, votre demande sera enregistrée et vous serez redirigé directement sur WhatsApp avec votre message pré-rempli.
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
