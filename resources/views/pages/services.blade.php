@extends('layouts.app')

@section('content')
    <!-- Services Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">{{ __('site.services_page_eyebrow') }}</div>
            <h1>
                {{ __('site.services_page_title') }} <span class="green">{{ __('site.services_page_title_highlight') }}</span>
            </h1>
            <p>
                {{ __('site.services_page_lead') }}
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
                    <span class="row-arrow" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '↖' : '↗' }}</span>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">{{ __('site.services_cta_eyebrow') }}</div>
                <h2>
                    {{ __('site.services_cta_title') }}<br>
                    <span class="green">{{ __('site.services_cta_title_highlight') }}</span>
                </h2>
                <p class="cta-desc">
                    {{ __('site.services_cta_desc') }}
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                {{ __('site.services_cta_btn') }}
            </a>
        </div>
    </section>
@endsection
