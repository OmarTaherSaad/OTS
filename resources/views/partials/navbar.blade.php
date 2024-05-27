<nav class="navbar navbar-expand-md fixed-top navbar-b navbar-trans" id="navbar">
    <div class="container-fluid px-0">
        <a class="navbar-brand js-scroll"
            @if (Request::route()->named('index')) href="#page-top" @else
            href="{{ route('index') }}" @endif>
            <img class="img-fluid" src="{{ Storage::url('assets/images/logo.png') }}" alt="OTS">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end px-4 px-md-0" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll @if (Request::route()->named('index') || Request::route()->named('home')) active @endif"
                        href="{{ auth()->check() ? route('users.home') : route('index') }}">Home</a>
                </li>
                @if (auth()->check() && auth()->user()->isAdmin())
                    <li class="nav-item @if (Request::route()->named('admin.dashboard')) active @endif">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    </li>
                    <li class="nav-item @if (Request::route()->named('admin.users')) active @endif">
                        <a class="nav-link" href="{{ route('admin.users') }}">All Users</a>
                    </li>
                @endif
                @if (Request::route()->named('index'))
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#apis">APIs Connected</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#work">Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="#contact">Contact</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link js-scroll @if (Request::route()->named('media')) active @endif"
                        href="{{ route('media') }}">Me in Media</a>
                </li>
                @include('partials.auth-for-nav')
                {{-- <li class="nav-item @if (Route::currentRouteName() == ' course-registration') active @endif">
                    <a class="nav-link" href="{{ route('course-registration') }}">Programming Courses</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
