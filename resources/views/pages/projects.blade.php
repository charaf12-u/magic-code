@extends('layouts.app')

@section('content')
    <!-- Projects Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">{{ __('site.projects_page_eyebrow') }}</div>
            <h1>
                {{ __('site.projects_page_title') }} <span class="green">{{ __('site.projects_page_title_highlight') }}</span>
            </h1>
            <p>
                {{ __('site.projects_page_lead') }}
            </p>
        </div>
    </section>

    <!-- Projects List -->
    <section class="section">
        <div class="container filter-container">
            <div class="filter-bar">
                <button class="filter-btn active" type="button" data-filter="all">{{ __('site.projects_filter_all') }} ({{ count($projects) }})</button>
                <button class="filter-btn" type="button" data-filter="web">{{ __('site.projects_filter_web') }}</button>
                <button class="filter-btn" type="button" data-filter="data">{{ __('site.projects_filter_data') }}</button>
                <button class="filter-btn" type="button" data-filter="mobile">{{ __('site.projects_filter_mobile') }}</button>
            </div>
        </div>

        <div class="container project-list">
            @foreach($projects as $p)
                <a class="portfolio-item reveal"
                   href="{{ route('projects.show', $p['slug']) }}"
                   data-category="{{ $p['slug'] === 'lotti' ? 'web' : ($p['slug'] === 'ridemate' ? 'mobile' : 'data') }}"
                >
                    <div class="portfolio-index">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-cat">{{ $p['category'] }}</span>
                        <h2>{{ $p['title'] }}</h2>
                        <p>{{ $p['short_description'] }}</p>
                        <div class="tech-tags-inline">
                            @foreach($p['tags'] as $tag)
                                <span class="tech-pill">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="portfolio-thumb">
                        <img src="{{ asset($p['image']) }}" alt="{{ $p['title'] }} {{ __('site.nav_projects') }}" loading="lazy">
                    </div>
                    <b class="portfolio-arrow" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '↖' : '↗' }}</b>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">{{ __('site.projects_cta_eyebrow') }}</div>
                <h2>
                    {{ __('site.projects_cta_title') }}<br>
                    <span class="green">{{ __('site.projects_cta_title_highlight') }}</span>
                </h2>
                <p class="cta-desc">
                    {{ __('site.projects_cta_desc') }}
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                {{ __('site.projects_cta_btn') }}
            </a>
        </div>
    </section>
@endsection
