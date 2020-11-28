<!doctype html>
<html lang="{{ App::getLocale() }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">
    <head>
        @if(App::environment('production'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-98638030-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag('js', new Date());

                  gtag('config', 'UA-98638030-3');
        </script>
        @endif
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name') }} | @yield('title')</title>
        {{-- Meta Data --}}
        <meta name="title" content="{{ config('app.name') }} | @yield('title')">
        <meta name="description" content="The personal website of Omar Taher Saad">
        <meta name="robots" content="index, follow">
        <meta name="theme-color" content="grey">
        <meta property="og:title" content="{{ config('app.name') }} | @yield('title')">
        <meta property="og:description" content="The personal website of Omar Taher Saad">
        <meta property="og:site_name" content="OTS - Omar Taher Saad">
        <meta property="og:type" content="website">
        <meta property="og:img" content="{{ asset('storage/assets/logo.jpg') }}">
        <meta http-equiv="Cache-control" content="private">

        <link rel="stylesheet" href="{{ mix('css/splashscreen.css') }}">

        <link href="{{ mix('js/app.js') }}" as="script">
        {{-- Google Font --}}
        <link rel="dns-prefetch" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
        <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito&display=swap" as="fetch"
            crossorigin="anonymous">
        <script type="text/javascript" async>
            !function(e,n,t){"use strict";var o="https://fonts.googleapis.com/css?family=Nunito&display=swap",r="__3perf_googleFonts_6c560";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage);
        </script>
        {{-- End of code snippet for Google Fonts --}}

        {{-- Icons --}}
        <link rel="shortcut icon" href="{{ asset('storage/assets/icons/favicon.ico') }}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ asset('storage/assets/icons/apple-touch-icon.png') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('storage/assets/icons/apple-touch-icon-57x57.png') }}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('storage/assets/icons/apple-touch-icon-72x72.png') }}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage/assets/icons/apple-touch-icon-76x76.png') }}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('storage/assets/icons/apple-touch-icon-114x114.png') }}" />
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('storage/assets/icons/apple-touch-icon-120x120.png') }}" />
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('storage/assets/icons/apple-touch-icon-144x144.png') }}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('storage/assets/icons/apple-touch-icon-152x152.png') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/assets/icons/apple-touch-icon-180x180.png') }}" />

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('head')

        {{-- PWA Manifest --}}
        <link rel="manifest" href="{{ asset('storage/manifest.json') }}">
    </head>

    <body id="page-top">
        @include('partials.splash-screen')
        @include('partials.navbar')
        <div id="app" class="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }} container-fluid @if(Request::route()->named('index')) px-0 @else pt-3 @endif">
            @include('partials.show-alerts')
            @yield('content')
            @include('partials.footer')
            {{--AXIOS loading effect--}}
            <div class="modal" id="axiosModal"></div>
        </div>
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <script defer src="https://www.google.com/recaptcha/api.js?render=6Lc447UUAAAAAKUbWbf6jTvZRmxvSOxnKW-VhneB"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
