<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" v-if="isTabletOrSmaller">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('storage/assets/logo.jpg') }}" alt="OTS Logo" class="rounded"/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li v-for="navItem in navbarMenu" class="nav-item" v-bind:class="navItem.class">
                <a class="nav-link" :href="navItem.href" :target="navItem.external === true ? '_blank' : ''">@{{ navItem.title }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact') }}" class="nav-link btn btn-primary text-light my-2 my-sm-0">{{ __('Contact Me') }}</a>
            </li>
            <li class="mx-auto nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ __("Language") }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('languageChange',['locale' => 'en']) }}">English</a>
                    <a class="dropdown-item" href="{{ route('languageChange',['locale' => 'ar']) }}">عربي</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<sidebar-menu ref="nav" v-if="!isTabletOrSmaller" :show-one-child="true" {{ App::isLocale('ar') ? 'rtl' : ''}} :menu="navbarMenu"
    @toggle-collapse="navToggled" :collapsed="true" :width="'240px'">
    <div slot="header">
        <a href="{{ route('home') }}">
            <prog-img src="{{ asset('storage/assets/logo.jpg') }}" alt="OTS Logo" vclass="rounded img-fluid p-1">
            </prog-img>
        </a>
    </div>
</sidebar-menu>