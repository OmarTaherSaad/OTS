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
        @if (config('app.landing_show_testimonials'))
            @include('landing.partials.testimonials')
        @endif
        @include('landing.partials.pricing')
        @include('landing.partials.retainer')
        @include('landing.partials.contact')
        @include('landing.partials.footer')
    </div>
@endsection
@section('scripts')
    @include('partials.contact-recaptcha-script')
    <script>
        window.skillsData = {!! json_encode($skills) !!};
    </script>
    @vite(['resources/js/landing.js', 'resources/js/forms.js'])
@endsection
