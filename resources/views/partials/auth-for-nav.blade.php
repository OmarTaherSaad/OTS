{{-- Authentication Links --}}
@auth
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {!! Auth::user()->getImage("img-fluid rounded",40) !!}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item {{ request()->is(route('users.courses',Auth::user())) ? 'active' : '' }}"
            href="{{ route('users.courses',Auth::user()) }}">
            View My Courses
        </a>
        <a class="dropdown-item {{ request()->is(route('users.edit',['user' => Auth::user()])) ? 'active' : '' }}"
            href="{{ route('users.edit',['user' => Auth::user()]) }}">
            Edit My Profile
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    </li>
@endauth
