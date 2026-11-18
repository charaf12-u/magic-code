@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero section">
        <div class="container hero-grid">
            <div class="hero-copy reveal">
                <div class="eyebrow">
                    <span class="pulse"></span> {{ __('site.available_status') }}
                </div>
                <h1>
                    {{ __('site.hero_title_prefix') }} <span class="green">{{ __('site.hero_title_highlight') }}</span>
                </h1>
                <p class="hero-lead">
                    {{ __('site.platform_presentation') }}
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                        {{ __('site.hero_cta_primary') }}
                    </a>
                    <a class="btn btn-ghost btn-big" href="{{ route('projects') }}">
                        {{ __('site.hero_cta_secondary') }}
                    </a>
                </div>
                <div class="trust-row">
                    <span><b class="check" style="color: var(--status-green);">✓</b> {{ __('site.trust_1') }}</span>
                    <span><b class="check" style="color: var(--status-green);">✓</b> {{ __('site.trust_2') }}</span>
                    <span><b class="check" style="color: var(--status-green);">✓</b> {{ __('site.trust_3') }}</span>
                </div>
            </div>

            <div class="hero-art reveal delay-1">
                <div class="orb"></div>
                <img src="{{ asset('images/magic-wand-hero.png') }}" alt="Magic Code - {{ __('site.slogan') }}" width="620" height="620" loading="eager">
                <div class="code-float">
                    &lt;code /&gt;<br>
                    <b>ideas → reality</b>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Metrics Band -->
    <section class="section dark-band" style="padding: 44px 0;">
        <div class="container stats">
            <div>
                <strong>{{ __('site.stat_1_val') }}</strong>
                <span>{{ __('site.stat_1_label') }}</span>
            </div>
            <div>
                <strong>{{ __('site.stat_2_val') }}</strong>
                <span>{{ __('site.stat_2_label') }}</span>
            </div>
            <div>
                <strong>{{ __('site.stat_3_val') }}</strong>
                <span>{{ __('site.stat_3_label') }}</span>
            </div>
            <div>
                <strong>{{ __('site.stat_4_val') }}</strong>
                <span>{{ __('site.stat_4_label') }}</span>
            </div>
        </div>
    </section>

    <!-- Ticker Banner -->
    <section class="ticker" aria-hidden="true">
        <div>
            <span>LARAVEL 11</span> <i>✦</i>
            <span>MOBILE APPS</span> <i>✦</i>
            <span>DATA ENGINEERING</span> <i>✦</i>
            <span>AI AGENTS & LLMs</span> <i>✦</i>
            <span>BUSINESS AUTOMATION</span> <i>✦</i>
            <span>TECHNICAL SEO</span> <i>✦</i>
            <span>LARAVEL 11</span> <i>✦</i>
            <span>MOBILE APPS</span> <i>✦</i>
            <span>DATA ENGINEERING</span> <i>✦</i>
            <span>AI AGENTS & LLMs</span> <i>✦</i>
            <span>BUSINESS AUTOMATION</span> <i>✦</i>
            <span>TECHNICAL SEO</span> <i>✦</i>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="section services-preview" id="services">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">{{ __('site.services_eyebrow') }}</div>
                    <h2>{{ __('site.services_title') }} <span class="green">{{ __('site.services_title_highlight') }}</span></h2>
                </div>
                <a class="text-link" href="{{ route('services') }}">
                    {{ __('site.services_all_link') }}
                </a>
            </div>

            <div class="service-grid">
                @foreach($featuredServices as $service)
                    <a class="service-card reveal" href="{{ route('services.show', $service['slug']) }}">
                        <div class="service-top">
                            <span>{{ $service['number'] }}</span>
                            <b>{{ $service['icon'] }}</b>
                        </div>
                        <h3>{{ $service['title'] }}</h3>
                        <p>{{ $service['short_description'] }}</p>
                        <span class="card-arrow" aria-hidden="true">{{ app()->getLocale() === 'ar' ? '↖' : '↗' }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Magic Code Section -->
    <section class="section dark-band">
        <div class="container two-col">
            <div>
                <div class="eyebrow">{{ __('site.why_eyebrow') }}</div>
                <h2>
                    {{ __('site.why_title') }}<br>
                    <span class="green">{{ __('site.why_title_highlight') }}</span>
                </h2>
                <p class="section-subtext">
                    {{ __('site.why_subtext') }}
                </p>
            </div>
            <div class="feature-list">
                <div>
                    <b>01</b>
                    <div>
                        <strong>{{ __('site.why_1_title') }}</strong>
                        <span>{{ __('site.why_1_desc') }}</span>
                    </div>
                </div>
                <div>
                    <b>02</b>
                    <div>
                        <strong>{{ __('site.why_2_title') }}</strong>
                        <span>{{ __('site.why_2_desc') }}</span>
                    </div>
                </div>
                <div>
                    <b>03</b>
                    <div>
                        <strong>{{ __('site.why_3_title') }}</strong>
                        <span>{{ __('site.why_3_desc') }}</span>
                    </div>
                </div>
                <div>
                    <b>04</b>
                    <div>
                        <strong>{{ __('site.why_4_title') }}</strong>
                        <span>{{ __('site.why_4_desc') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Preview -->
    <section class="section projects-preview" id="projects">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">{{ __('site.projects_eyebrow') }}</div>
                    <h2>{{ __('site.projects_title') }} <span class="green">{{ __('site.projects_title_highlight') }}</span></h2>
                </div>
                <a class="text-link" href="{{ route('projects') }}">
                    {{ __('site.projects_all_link') }}
                </a>
            </div>

            <div class="project-grid">
                @foreach($featuredProjects as $p)
                    <a class="project-card {{ $p['color_theme'] }} reveal" href="{{ route('projects.show', $p['slug']) }}">
                        <div class="project-card-header">
                            <span>{{ $p['category'] }}</span>
                            <h3>{{ $p['title'] }}</h3>
                            <p>{{ $p['short_description'] }}</p>
                        </div>
                        <div class="project-card-visual">
                            <img src="{{ asset($p['image']) }}" alt="{{ $p['title'] }} interface" loading="lazy">
                        </div>
                        <div class="project-mark" aria-hidden="true">{{ $p['badge'] }}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Methodology / Process -->
    <section class="section process">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">{{ __('site.process_eyebrow') }}</div>
                    <h2>{{ __('site.process_title') }} <span class="green">{{ __('site.process_title_highlight') }}</span></h2>
                </div>
            </div>

            <div class="process-grid">
                <div>
                    <span>01</span>
                    <h3>{{ __('site.process_1_title') }}</h3>
                    <p>{{ __('site.process_1_desc') }}</p>
                </div>
                <div>
                    <span>02</span>
                    <h3>{{ __('site.process_2_title') }}</h3>
                    <p>{{ __('site.process_2_desc') }}</p>
                </div>
                <div>
                    <span>03</span>
                    <h3>{{ __('site.process_3_title') }}</h3>
                    <p>{{ __('site.process_3_desc') }}</p>
                </div>
                <div>
                    <span>04</span>
                    <h3>{{ __('site.process_4_title') }}</h3>
                    <p>{{ __('site.process_4_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials / Social Proof -->
    <section class="section dark-band">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">{{ __('site.testimonials_eyebrow') }}</div>
                    <h2>{{ __('site.testimonials_title') }} <span class="green">{{ __('site.testimonials_title_highlight') }}</span></h2>
                </div>
                <div class="rating-badge">
                    <span class="stars">★★★★★</span>
                    <b>{{ __('site.testimonials_rating') }}</b>
                </div>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card reveal">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        {{ __('site.test_1_quote') }}
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">ML</div>
                        <div>
                            <strong>{{ __('site.test_1_author') }}</strong>
                            <span>{{ __('site.test_1_role') }}</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card reveal delay-1">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        {{ __('site.test_2_quote') }}
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">ST</div>
                        <div>
                            <strong>{{ __('site.test_2_author') }}</strong>
                            <span>{{ __('site.test_2_role') }}</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card reveal delay-2">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        {{ __('site.test_3_quote') }}
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">YM</div>
                        <div>
                            <strong>{{ __('site.test_3_author') }}</strong>
                            <span>{{ __('site.test_3_role') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion -->
    <section class="section faq-section" id="faq">
        <div class="container faq-grid-wrap">
            <div class="faq-head">
                <div class="eyebrow">{{ __('site.faq_eyebrow') }}</div>
                <h2>{{ __('site.faq_title') }} <span class="green">{{ __('site.faq_title_highlight') }}</span></h2>
                <p class="prose">
                    {{ __('site.faq_lead') }}
                </p>
                <a class="btn btn-ghost" href="{{ route('contact') }}">
                    {{ __('site.faq_ask_btn') }}
                </a>
            </div>

            <div class="faq-accordion">
                <div class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>{{ __('site.faq_q1') }}</span>
                        <b class="faq-icon" aria-hidden="true">+</b>
                    </button>
                    <div class="faq-answer">
                        <p>
                            {{ __('site.faq_a1') }}
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>{{ __('site.faq_q2') }}</span>
                        <b class="faq-icon" aria-hidden="true">+</b>
                    </button>
                    <div class="faq-answer">
                        <p>
                            {{ __('site.faq_a2') }}
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>{{ __('site.faq_q3') }}</span>
                        <b class="faq-icon" aria-hidden="true">+</b>
                    </button>
                    <div class="faq-answer">
                        <p>
                            {{ __('site.faq_a3') }}
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>{{ __('site.faq_q4') }}</span>
                        <b class="faq-icon" aria-hidden="true">+</b>
                    </button>
                    <div class="faq-answer">
                        <p>
                            {{ __('site.faq_a4') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container cta-box">
            <div>
                <div class="eyebrow">{{ __('site.cta_eyebrow') }}</div>
                <h2>
                    {{ __('site.cta_title') }}<br>
                    <span class="green">{{ __('site.cta_title_highlight') }}</span>
                </h2>
                <p class="cta-desc">
                    {{ __('site.cta_desc') }}
                </p>
            </div>
            <a class="btn btn-primary btn-big" href="{{ route('contact') }}">
                {{ __('site.cta_btn') }}
            </a>
        </div>
    </section>
@endsection

@push('head')
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'Magic Code',
        'url' => url('/'),
        'logo' => asset('images/magic-code-logo.png'),
        'description' => __('site.meta_description'),
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Morocco',
        ],
        'knowsAbout' => [
            'Web Development',
            'Laravel Framework',
            'Mobile App Development',
            'Data Analytics',
            'Artificial Intelligence',
            'Process Automation',
            'Technical SEO',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush
