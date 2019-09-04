<!doctype html>
<html lang="{{ App::getLocale() }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">
    <head>
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
        
        <link rel="stylesheet" href="{{ mix('css/splashscreen.css') }}">

        <link href="{{ mix('js/manifest.js') }}" as="script">
        <link href="{{ mix('js/vendor.js') }}" as="script">
        <link href="{{ mix('js/app.js') }}" as="script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
        <link rel="icon" href="{{ asset('storage/assets/logo.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('storage/assets/icons/apple-touch-icon.png') }}">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @if (App::isLocale('ar'))
        <link rel="stylesheet" href="{{ mix('css/bootstrapAR.css') }}">
        @endif
        <link rel="stylesheet" href="{{ mix('css/sidebar.css') }}">
        {{-- media="screen and (min-width:768px)" --}}
        @yield('head')

        {{-- PWA Manifest --}}
        <link rel="manifest" href="{{ asset('storage/manifest.json') }}">
    </head>

    <body class="mt-md-0 mt-5">
        @include('partials.splash-screen')
        @include('partials.navbar')
        <div id="app" class="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">
            @include('partials.show-alerts')
            @yield('content')
            @include('partials.footer')
        </div>

        <div class="page-overlay"></div>
        {{--Laravel Mix (code splitting)--}}
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        @yield('scripts-First')
        <script src="{{ mix('js/app.js') }}"></script>
        @yield('scripts')
        <script defer>
            var isTabletOrSmaller = screen.width < 768;
            //Mark page when loaded to remove splash screen
            window.addEventListener('load',function() {
                document.body.classList.add('loaded');
            });
            //Hide Navbar when scrolling down
            //Use a debounce timer to improve performance
            var debounce_timer;
            window.onscroll = function() {
                //Use a debounce timer to improve performance
                if(debounce_timer) {
                window.clearTimeout(debounce_timer);
                }
                debounce_timer = window.setTimeout(function() {
                    //Real function START

                    // Shrink Navbar on scroll (if tablet or smaller)
                    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
                    if (!isTabletOrSmaller) // Not small enough (sidebar is shown)
                        {return;}
                    //Scroll Effect
                    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                        document.querySelector('.navbar-logo>img').style.maxHeight = '50px';
                    } else {
                        document.querySelector('.navbar-logo>img').style.maxHeight = '80px';
                    }
                    
                    //Real function END
                }, 100);
            }
        </script>
    </body>
</html>