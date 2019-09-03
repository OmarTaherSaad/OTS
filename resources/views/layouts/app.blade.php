<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start('ob_gzhandler'); else ob_start(); ?>
<!doctype html>
<html lang="{{ App::getLocale() }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name') }} | @yield('title')</title>
        {{-- Meta Data --}}
        <meta name="title" content="{{ config('app.name') }} | @yield('title')">
        <meta name="description" content="The personal website of Omar Taher Saad">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ config('app.name') }} | @yield('title')">
        <meta property="og:description" content="The personal website of Omar Taher Saad">
        <meta property="og:site_name" content="OTS - Omar Taher Saad">
        
        <link rel="stylesheet" href="{{ asset('css/splashscreen.css') }}">

        <link href="{{ asset('js/manifest.js') }}" as="script">
        <link href="{{ asset('js/vendor.js') }}" as="script">
        <link href="{{ asset('js/app.js') }}" as="script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
        <link rel="icon" href="{{ asset('storage/assets/logo.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('storage/assets/logo.ico') }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
        @if (App::isLocale('ar'))
        <link rel="stylesheet" href="{{ asset('css/bootstrapAR.css') }}">
        @endif
        {{-- <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" media="screen and (min-width:768px)"> --}}
        @yield('head')

        {{-- PWA --}}
        <meta name="theme-color" content="grey">
        <link rel="manifest" href="{{ asset('storage/manifest.json') }}">
    </head>

    <body class="mt-md-0 mt-5 pt-5 pt-md-0">
        @include('partials.splash-screen')
        <div id="app">
            @include('partials.show-alerts')
            @yield('content')
            @include('partials.footer')
            @include('partials.navbar')
        </div>

        <div class="page-overlay"></div>
        {{--Laravel Mix (code splitting)--}}
        <script src="{{ asset('js/manifest.js') }}"></script>
        <script src="{{ asset('js/vendor.js') }}"></script>
        <script async>
            window.navbarMenu = [
                        {
                            href: "{{ route('home') }}",
                            title: "{{ __('Home') }}",
                            // icon: "fas fa-home",
                            icon: "fas fa-user-circle",
                            class: "{{ request()->route()->named('home') ? 'active' : '' }}"
                        },
                        // {
                        //     href: "{{ route('aboutMe') }}",
                        //     title: "{{ __('About Me') }}",
                        //     icon: "fas fa-user-circle",
                        //     class: "{{ request()->route()->named('aboutMe') ? 'active' : '' }}"
                        // },
                        // {
                        //     href: "{{ route('projects') }}",
                        //     title: "{{ __('My Projects') }}",
                        //     icon: "fas fa-briefcase",
                        //     class: "{{ request()->route()->named('projects') ? 'active' : '' }}"
                        // },
                        {
                            href: "{{ route('media') }}",
                            title: "{!! __('Media & Interviews') !!}",
                            icon: "fas fa-video",
                            class: "{{ request()->route()->named('media') ? 'active' : '' }}"
                        },
                        {
                            //href: "{{ route('youtube') }}",
                            href: "{{ config('ots.social-media.youtube') }}",
                            external: true,
                            attributes: {
                                target: "_blank",
                                rel: "noreferrer"
                            },
                            title: "{{ __('YouTube') }}",
                            icon: "fab fa-youtube",
                            class: "{{ request()->route()->named('youtube') ? 'active' : '' }}"
                        },
                        {
                            href: "{{ route('contact') }}",
                            title: "{{ __('Contact Me') }}",
                            icon: "fas fa-envelope",
                            class: "{{ request()->route()->named('contact') ? 'active' : '' }}"
                        },
                        {
                            title: "{{ __('Language') }}",
                            icon: "fas fa-globe-africa",
                            child: [
                                {
                                    title: "English",
                                    href: "{{ route('languageChange',['locale' => 'en']) }}",
                                    class: "{{ App::isLocale('ar') ? '' : 'active' }}"
                                },
                                {
                                    title: "عربي",
                                    href: "{{ route('languageChange',['locale' => 'ar']) }}",
                                    class: "{{ App::isLocale('ar') ? 'active' : '' }}"
                                }
                            ]
                        }
                    ];
        </script>
        @yield('scripts-First')
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
        <script defer>
            window.addEventListener('load',function() {
                document.body.classList.add('loaded');
            });
        </script>
    </body>
</html>