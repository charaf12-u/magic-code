@extends('layouts.app')

@section('content')
    <!-- Project Hero -->
    <section class="page-hero project-detail">
        <div class="container">
            <a class="back-link" href="{{ route('projects') }}">
                {{ __('site.back_to_projects') }}
            </a>
            <div class="eyebrow">{{ $project['category'] }}</div>
            <h1>{{ $project['title'] }}</h1>
            <p>{{ $project['summary'] }}</p>

            <div class="tag-row">
                @foreach($project['tags'] as $tag)
                    <span>{{ $tag }}</span>
                @endforeach
            </div>

            <div class="hero-actions" style="margin-top: 30px;">
                <a class="btn btn-primary" href="{{ route('contact') }}">
                    {{ __('site.start_similar_project') }}
                </a>
                <button class="btn btn-ghost" type="button" onclick="navigator.clipboard.writeText(window.location.href); if (window.showMagicToast) window.showMagicToast('{{ addslashes(__('site.link_copied')) }}');">
                    {{ __('site.share_project') }}
                </button>
            </div>
        </div>
    </section>

    <!-- Key Metrics / Results Banner -->
    @if(!empty($project['results']))
        <section class="section dark-band project-metrics-band">
            <div class="container stats">
                @foreach($project['results'] as $val => $label)
                    <div>
                        <strong>{{ $val }}</strong>
                        <span>{{ $label }}</span>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Case Study Core -->
    <section class="section">
        <div class="container case-grid">
            <div class="case-visual">
                <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" loading="lazy">
                <div class="case-visual-badge">
                    <span>{{ __('site.project_certified_badge') }}</span>
                    <b>Magic Code</b>
                </div>
            </div>

            <div class="case-details">
                <div class="case-block">
                    <div class="eyebrow">{{ __('site.project_challenge_eyebrow') }}</div>
                    <h2>{{ __('site.project_challenge_title') }} <span class="green">{{ __('site.project_challenge_title_highlight') }}</span></h2>
                    <p class="prose">
                        {{ $project['challenge'] }}
                    </p>
                </div>

                <div class="case-block">
                    <div class="eyebrow">{{ __('site.project_solution_eyebrow') }}</div>
                    <h2>{{ __('site.project_solution_title') }} <span class="green">{{ __('site.project_solution_title_highlight') }}</span></h2>
                    <p class="prose">
                        {{ $project['solution'] }}
                    </p>
                </div>

                <div class="case-block">
                    <div class="eyebrow">{{ __('site.project_features_eyebrow') }}</div>
                    <ul class="check-list">
                        @foreach($project['features'] as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Projects -->
    @if(!empty($otherProjects))
        <section class="section dark-band">
            <div class="container">
                <div class="section-head">
                    <div>
                        <div class="eyebrow">{{ __('site.other_projects_eyebrow') }}</div>
                        <h2>{{ __('site.other_projects_title') }} <span class="green">{{ __('site.other_projects_title_highlight') }}</span></h2>
                    </div>
                    <a class="text-link" href="{{ route('projects') }}">
                        {{ __('site.view_all_projects') }}
                    </a>
                </div>

                <div class="project-grid">
                    @foreach(array_slice($otherProjects, 0, 2) as $other)
                        <a class="project-card {{ $other['color_theme'] }}" href="{{ route('projects.show', $other['slug']) }}">
                            <span>{{ $other['category'] }}</span>
                            <h3>{{ $other['title'] }}</h3>
                            <p>{{ $other['short_description'] }}</p>
                            <div class="project-mark" aria-hidden="true">{{ $other['badge'] }}</div>
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
                <div class="eyebrow">{{ __('site.project_cta_eyebrow') }}</div>
                <h2>
                    {{ __('site.project_cta_title') }} <span class="green">{{ __('site.project_cta_title_highlight') }}</span>
                </h2>
                <p class="cta-desc">
                    {{ __('site.project_cta_desc') }}
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                {{ __('site.nav_cta') }} {{ app()->getLocale() === 'ar' ? '↖' : '↗' }}
            </a>
        </div>
    </section>
@endsection
