@extends('layouts.app')
@section('title', 'Home')
@section('head')
    @vite(['resources/css/landing.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700;800&display=swap" rel="stylesheet">
@endsection
@section('content')
    <div class="landing antialiased">
        @include('landing.partials.navbar')
        @include('landing.partials.hero')
        @include('landing.partials.about')
        @include('landing.partials.experience')
        @include('landing.partials.services')
        @include('landing.partials.apis')
        @include('landing.partials.projects')
        @include('landing.partials.testimonials')
        @include('landing.partials.pricing')
        @include('landing.partials.contact')
    </div>
@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.site_key') }}"></script>
    <script>
        grecaptcha.ready(function() {
            var form = document.getElementById('ContactForm');
            if (!form) return;
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                grecaptcha.execute('{{ config('captcha.site_key') }}', {
                    action: 'contact'
                }).then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token;
                    form.submit();
                });
            });
        });
    </script>
    <script>
        window.skillsData = {!! json_encode($skills) !!};
    </script>
    @vite(['resources/js/landing.js', 'resources/js/forms.js'])
@endsection
