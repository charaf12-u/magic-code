@extends('layouts.app')

@section('content')
    <!-- Contact Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">{{ __('site.contact_page_eyebrow') }}</div>
            <h1>
                {{ __('site.contact_title') }} <span class="green">{{ __('site.contact_title_highlight') }}</span>
            </h1>
            <p>
                {{ __('site.contact_lead') }}
            </p>
        </div>
    </section>

    <!-- Contact Grid -->
    <section class="section">
        <div class="container contact-grid">
            <!-- Contact Informations -->
            <div class="contact-info">
                <div class="eyebrow">{{ __('site.contact_channels_eyebrow') }}</div>
                <h2>
                    {{ __('site.contact_channels_title') }}<br>
                    <span class="green">{{ __('site.contact_channels_title_highlight') }}</span>
                </h2>

                <div class="contact-channels">
                    <a class="contact-card" href="mailto:{{ config('contact.email') }}">
                        <span class="channel-icon">✉</span>
                        <div>
                            <strong>{{ __('site.contact_email_direct') }}</strong>
                            <span>{{ config('contact.email') }}</span>
                        </div>
                    </a>

                    <a class="contact-card" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('contact.whatsapp')) }}?text={{ rawurlencode(__('site.whatsapp_prefilled')) }}" target="_blank" rel="noopener noreferrer">
                        <span class="channel-icon">💬</span>
                        <div>
                            <strong>{{ __('site.contact_whatsapp_biz') }}</strong>
                            <span>{{ config('contact.phone') }}</span>
                        </div>
                    </a>

                    <div class="contact-card static-card">
                        <span class="channel-icon">📍</span>
                        <div>
                            <strong>{{ __('site.contact_location_label') }}</strong>
                            <span>{{ config('contact.location') }}</span>
                        </div>
                    </div>
                </div>

                <div class="mini-note">
                    <p>⚡ <strong>{{ __('site.contact_response_time') }}</strong></p>
                </div>
            </div>

            <!-- Contact Form Card -->
            <div class="form-card">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>✓ {{ __('site.contact_success_title') }}</strong>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error" role="alert">
                        <strong>⚠ {{ __('site.contact_error_title') }}</strong>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error" role="alert">
                        <strong>⚠ {{ __('site.contact_validation_title') }}</strong>
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
                            {{ __('site.contact_field_name') }} <span class="required">*</span>
                            <input
                                id="contact-name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                placeholder="{{ __('site.contact_field_name_placeholder') }}"
                                class="@error('name') input-error @enderror"
                            >
                            @error('name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <label for="contact-email">
                            {{ __('site.contact_field_email') }} <span class="required">*</span>
                            <input
                                id="contact-email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="{{ __('site.contact_field_email_placeholder') }}"
                                class="@error('email') input-error @enderror"
                            >
                            @error('email')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <label for="contact-service">
                        {{ __('site.contact_field_service') }}
                        <select id="contact-service" name="service">
                            <option value="">{{ __('site.contact_service_default') }}</option>
                            <option value="Web & Laravel" {{ old('service') == 'Web & Laravel' ? 'selected' : '' }}>{{ __('site.contact_service_web') }}</option>
                            <option value="Applications mobiles" {{ old('service') == 'Applications mobiles' ? 'selected' : '' }}>{{ __('site.contact_service_mobile') }}</option>
                            <option value="Data Analytics & BI" {{ old('service') == 'Data Analytics & BI' ? 'selected' : '' }}>{{ __('site.contact_service_data') }}</option>
                            <option value="IA & Automatisation" {{ old('service') == 'IA & Automatisation' ? 'selected' : '' }}>{{ __('site.contact_service_ai') }}</option>
                            <option value="SEO & Performance" {{ old('service') == 'SEO & Performance' ? 'selected' : '' }}>{{ __('site.contact_service_seo') }}</option>
                            <option value="UI/UX & Design" {{ old('service') == 'UI/UX & Design' ? 'selected' : '' }}>{{ __('site.contact_service_design') }}</option>
                            <option value="Autre demande" {{ old('service') == 'Autre demande' ? 'selected' : '' }}>{{ __('site.contact_service_other') }}</option>
                        </select>
                        @error('service')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label for="contact-message">
                        {{ __('site.contact_field_message') }} <span class="required">*</span>
                        <textarea
                            id="contact-message"
                            name="message"
                            rows="6"
                            required
                            placeholder="{{ __('site.contact_field_message_placeholder') }}"
                            class="@error('message') input-error @enderror"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </label>

                    <button class="btn btn-primary btn-block" type="submit">
                        {{ __('site.contact_btn_submit') }}
                    </button>
                    <p class="form-hint">
                        {{ __('site.contact_whatsapp_hint') }}
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
