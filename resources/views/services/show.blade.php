@extends('layouts.app')

@section('content')
    <!-- Service Hero -->
    <section class="page-hero service-detail-hero">
        <div class="container">
            <a class="back-link" href="{{ route('services') }}">
                {{ __('site.back_to_services') }}
            </a>
            <div class="eyebrow">
                {{ __('site.service_detail_eyebrow') }} {{ $service['number'] }} · {{ strtoupper($service['slug']) }}
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
                <div class="eyebrow">{{ __('site.deliverables_heading') }}</div>
                <h2>
                    {{ __('site.deliverables_title') }} <span class="green">{{ __('site.deliverables_title_highlight') }}</span>
                </h2>
                <p class="prose">
                    {{ __('site.deliverables_intro') }}
                </p>

                <div class="benefits-block">
                    <h3>{{ __('site.benefits_heading') }}</h3>
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
                            <strong>{{ __('site.deliverable_key_label') }}</strong>
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
                        <div class="eyebrow">{{ __('site.other_services_eyebrow') }}</div>
                        <h2>{{ __('site.other_services_title') }} <span class="green">{{ __('site.other_services_title_highlight') }}</span></h2>
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
                            <span class="card-arrow" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '↖' : '↗' }}</span>
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
                <div class="eyebrow">{{ __('site.service_quote_eyebrow') }}</div>
                <h2>
                    {{ __('site.service_quote_title') }}<br>
                    <span class="green">{{ __('site.service_quote_title_highlight') }}</span>
                </h2>
                <p class="cta-desc">
                    {{ __('site.service_quote_desc') }}
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                {{ __('site.service_quote_btn') }}
            </a>
        </div>
    </section>
@endsection
