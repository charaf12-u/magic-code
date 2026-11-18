@extends('layouts.app')

@section('content')
    <!-- About Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">{{ __('site.about_page_eyebrow') }}</div>
            <h1>
                {{ __('site.about_title') }}<br>
                <span class="green">{{ __('site.about_title_highlight') }}</span>
            </h1>
            <p>
                {{ __('site.about_lead') }}
            </p>
        </div>
    </section>

    <!-- About Philosophy -->
    <section class="section">
        <div class="container about-grid">
            <div>
                <div class="eyebrow">{{ __('site.about_philosophy_eyebrow') }}</div>
                <h2>
                    {{ __('site.about_philosophy_title') }}<br>
                    <span class="green">{{ __('site.about_philosophy_title_highlight') }}</span>
                </h2>
                <div class="quote-card">
                    <p>{{ __('site.about_quote') }}</p>
                </div>
            </div>
            <div class="prose">
                <p>
                    {{ __('site.about_philosophy_p1') }}
                </p>
                <p>
                    {{ __('site.about_philosophy_p2') }}
                </p>
                <ul class="check-list">
                    <li>{{ __('site.about_check_1') }}</li>
                    <li>{{ __('site.about_check_2') }}</li>
                    <li>{{ __('site.about_check_3') }}</li>
                    <li>{{ __('site.about_check_4') }}</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Stats Band -->
    <section class="section dark-band">
        <div class="container stats">
            <div>
                <strong>{{ __('site.about_stat_1_val') }}</strong>
                <span>{{ __('site.about_stat_1_label') }}</span>
            </div>
            <div>
                <strong>{{ __('site.about_stat_2_val') }}</strong>
                <span>{{ __('site.about_stat_2_label') }}</span>
            </div>
            <div>
                <strong>{{ __('site.about_stat_3_val') }}</strong>
                <span>{{ __('site.about_stat_3_label') }}</span>
            </div>
            <div>
                <strong>{{ __('site.about_stat_4_val') }}</strong>
                <span>{{ __('site.about_stat_4_label') }}</span>
            </div>
        </div>
    </section>

    <!-- Values Grid -->
    <section class="section">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">{{ __('site.about_values_eyebrow') }}</div>
                    <h2>{{ __('site.about_values_title') }} <span class="green">{{ __('site.about_values_title_highlight') }}</span></h2>
                </div>
            </div>

            <div class="process-grid">
                <div>
                    <span>01</span>
                    <h3>{{ __('site.about_val_1_title') }}</h3>
                    <p>{{ __('site.about_val_1_desc') }}</p>
                </div>
                <div>
                    <span>02</span>
                    <h3>{{ __('site.about_val_2_title') }}</h3>
                    <p>{{ __('site.about_val_2_desc') }}</p>
                </div>
                <div>
                    <span>03</span>
                    <h3>{{ __('site.about_val_3_title') }}</h3>
                    <p>{{ __('site.about_val_3_desc') }}</p>
                </div>
                <div>
                    <span>04</span>
                    <h3>{{ __('site.about_val_4_title') }}</h3>
                    <p>{{ __('site.about_val_4_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">{{ __('site.about_cta_eyebrow') }}</div>
                <h2>
                    {{ __('site.about_cta_title') }}<br>
                    <span class="green">{{ __('site.about_cta_title_highlight') }}</span>
                </h2>
                <p class="cta-desc">
                    {{ __('site.about_cta_desc') }}
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                {{ __('site.about_cta_btn') }}
            </a>
        </div>
    </section>
@endsection
