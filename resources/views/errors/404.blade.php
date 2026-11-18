@extends('layouts.app')

@section('content')
    <section class="section error-page">
        <div class="container error-wrap">
            <div class="error-code">404</div>
            <div class="eyebrow">{{ __('site.error_eyebrow') }}</div>
            <h1>{{ __('site.error_title') }} <span class="green">{{ __('site.error_title_highlight') }}</span></h1>
            <p class="prose">
                {{ __('site.error_desc') }}
            </p>
            <div class="error-actions">
                <a class="btn btn-primary" href="{{ route('home') }}">
                    {{ __('site.error_btn_home') }}
                </a>
                <a class="btn btn-ghost" href="{{ route('projects') }}">
                    {{ __('site.error_btn_projects') }}
                </a>
            </div>
        </div>
    </section>
@endsection
