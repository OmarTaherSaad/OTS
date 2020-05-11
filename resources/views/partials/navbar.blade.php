<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand js-scroll" href="#page-top">
            <img class="img-fluid" src="{{ Storage::url('assets/images/logo.png') }}" alt="OTS">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll active" href="{{ route('home') }}">Home</a>
                </li>
                @if(Route::currentRouteName() == 'home')
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#service">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#work">Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#contact">Contact</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
