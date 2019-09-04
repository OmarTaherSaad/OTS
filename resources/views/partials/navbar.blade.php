<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top sidebar d-md-block d-flex">
    <a class="navbar-logo" href="{{ route('home') }}">
        <img src="{{ asset('storage/assets/logo.jpg') }}" alt="OTS Logo" class="rounded img-fluid" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav d-md-block d-flex px-0">
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->named('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    {{-- <i class="fas fa-home"></i> <span class="text">@lang('Home')</span> --}}
                    <i class="fas fa-user-circle"></i> <span class="text">@lang('Home')</span>
                </a>
            </li>
            {{--
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->named('aboutMe') ? 'active' : '' }}" href="{{ route('aboutMe') }}">
                    <i class="fas fa-user-circle"></i> <span class="text">@lang('About Me')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->named('projects') ? 'active' : '' }}" href="{{ route('projects') }}">
                    <i class="fas fa-briefcase"></i> <span class="text">@lang('My Projects')</span>
                </a>
            </li>
            --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->named('media') ? 'active' : '' }}" href="{{ route('media') }}">
                    <i class="fas fa-video"></i> <span class="text">@lang('Media & Interviews')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->named('youtube') ? 'active' : '' }}" target="_blank" ref="noreferrer"
                    href="{{ config('ots.social-media.youtube') }}" rel="noreferrer">
                    <i class="fab fa-youtube"></i> <span class="text">@lang('YouTube')</span>
                </a>
            </li>
            <li class="bottom3 nav-item">
                <a class="nav-link btn btn-primary text-light my-2 my-sm-0 {{ request()->route()->named('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                    <i class="fas fa-envelope"></i> <span class="text">@lang('Contact Me')</span>
                </a>
            </li>
            <li class="bottom2 nav-item dropdown dropup">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-globe-africa last"></i> <span class="text">@lang("Language")</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('languageChange',['locale' => 'en']) }}">English</a>
                    <a class="dropdown-item" href="{{ route('languageChange',['locale' => 'ar']) }}">عربي</a>
                </div>
            </li>
            <li class="bottom1 nav-item">
                <i class="nav-link expander fas fa-arrows-alt-h fa-10x"></i>
            </li>
        </ul>
    </div>
</nav>