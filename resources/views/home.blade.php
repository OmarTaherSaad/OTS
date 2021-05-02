@extends('layouts.app')
@section('title','Home')
@section('head')
<link href="{{ mix('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div id="home" class="intro route bg-image"
    style="background-image: url({{ Storage::url('assets/images/BGs/bg4.jpg') }})">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <p class="display-6 color-d">Hello there!</p>
                <h1 class="intro-title mb-4">I am Omar Taher Saad</h1>
                <p class="intro-subtitle"><span class="text-slider-items">Computer Engineer,Full Stack Web
                        Developer,Video Editor,Founder of Thanawya Helwa,Graphic Designer</span><strong
                        class="text-slider"></strong></p>
                <p class="pt-3"><a class="btn btn-primary js-scroll px-4" href="#about" role="button">Learn More</a></p>
            </div>
        </div>
    </div>
</div>
 {{-- About Section --}}
    <section id="about" class="about-mf sect-pt4 route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5">
                                        <div class="about-img">
                                            <img src="{{ Storage::url('assets/images/Personal Photo.jpg') }}"
                                                class="img-fluid rounded b-shadow-a" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="about-info">
                                            <p><span class="title-s">Name: </span> <span>Omar Taher Saad</span></p>
                                            <p><span class="title-s">Profile: </span> <span>Computer Engineer</span></p>
                                            <p><span class="title-s">Email: </span>
                                                <span><a href="mailto:{{ config('app.contact_email') ?? "contact@omartahersaad.com"}}"></a>{{ config('app.contact_email') ?? "contact@omartahersaad.com" }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-mf">
                                    <p class="title-s">Skill</p>
                                    <span>HTML, CSS & JS</span> <span class="pull-right">90%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 90%;"
                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>PHP</span> <span class="pull-right">75%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>Laravel</span> <span class="pull-right">80%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>VUE JS</span> <span class="pull-right">70%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 70%"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>C#</span> <span class="pull-right">85%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 85%"
                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>Photoshop</span> <span class="pull-right">95%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 95%"
                                            aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>Premiere Pro</span> <span class="pull-right">90%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 90%"
                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-me pt-4 pt-md-0">
                                    <div class="title-box-2">
                                        <h5 class="title-left">
                                            About me
                                        </h5>
                                    </div>
                                    <p class="lead">
                                        I managed to gain many skills by self-learning; I learnt web development using
                                        PHP & basic front end skills, then I upgraded myself and finished the laracast's
                                        courses of Laravel and Vuejs. I took other courses on Coursera in algorithms,
                                        data structures, and neural networks. Now, I'm still taking courses on Coursera
                                        to finish the neural networks specialization.
                                    </p>
                                    <p class="lead">
                                        I'm open to new experiences and I'm very interested in working remotely, you
                                        will find me good communicator, friendly, and most important: Committed to
                                        deadlines.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- About Section END --}}
    {{-- Section --}}
    <section id="service" class="services-mf route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Services
                        </h3>
                        <p class="subtitle-a">
                            Here's what I can offer to you ..
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-box">
                        <div class="service-ico">
                            <span class="ico-circle"><i class="fas fa-cogs"></i></span>
                        </div>
                        <div class="service-content">
                            <h2 class="s-title">Software Engineering</h2>
                            <p class="s-description text-center">
                                I can code in C, C++, C# and Python. I used many technologies like .NET Core, MVC Design
                                Pattern, LINQ, relational DBs in SQLite and MySQL. I studied data structures and
                                algorithms, also I studied logic circuits and computer organization.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <div class="service-ico">
                            <span class="ico-circle"><i class="fas fa-laptop-code"></i></span>
                        </div>
                        <div class="service-content">
                            <h2 class="s-title">Web Development</h2>
                            <p class="s-description text-center">
                                I work as a full stack web developer, I use PHP Laravel in the backend, and Sass and
                                Vue.js in the frontend. Also I worked on websites that have online payment,
                                notifications, and many various features.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <div class="service-ico">
                            <span class="ico-circle"><i class="fas fa-video"></i></span>
                        </div>
                        <div class="service-content">
                            <h2 class="s-title">Video Editing</h2>
                            <p class="s-description text-center">
                                I work on video production starting from shooting, color correction and pre-editing
                                touches. I work on audio editing and noise cancellation, and I do the montage work and
                                make all required graphics.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <div class="service-ico">
                            <span class="ico-circle"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <div class="service-content">
                            <h2 class="s-title">Responsive Design</h2>
                            <p class="s-description text-center">
                                I make web designs that are mobile-first. My designs fit in all screen sizes so that
                                your website works well in all cases.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <div class="service-ico">
                            <span class="ico-circle"><i class="fas fa-palette"></i></span>
                        </div>
                        <div class="service-content">
                            <h2 class="s-title">Graphic Design</h2>
                            <p class="s-description text-center">
                                I'm able to make graphic, GIFs, Infographs, and all types of prints
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <div class="service-ico">
                            <span class="ico-circle"><i class="fas fa-bullhorn"></i></span>
                        </div>
                        <div class="service-content">
                            <h2 class="s-title">Social Media Marketing</h2>
                            <p class="s-description text-center">
                                I can work on putting marketing plans for all social media platforms, and work on
                                executing them and work with Audience Insights on Facebook platform. I do well with Ads
                                targeting as well.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Section END --}}

    {{-- Portfolio --}}
    <section id="work" class="portfolio-mf sect-pt4 route bg-image"
        style="background-image: url({{ Storage::url('assets/images/BGs/bg1.jpg') }})">
        <div class="overlay-itro"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Portfolio
                        </h3>
                        <p class="subtitle-a">
                            Some of my work
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="work-box">
                        <a href="{{ Storage::url('assets/images/projects/web-windowspvc.jpg') }}"
                            data-gall="portfolioGallery" class="venobox">
                            <div class="work-img">
                                <img src="{{ Storage::url('assets/images/projects/Progressive-web-windowspvc.jpg') }}"
                                    alt="" class="img-fluid w-100">
                            </div>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Egyptian Saudian Company for UPVC</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Web Development</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="https://windowspvc.com" target="_blank">Open</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work-box">
                        <a href="{{ Storage::url('assets/images/projects/web-thanawyahelwa.jpg') }}"
                            data-gall="portfolioGallery" class="venobox">
                            <div class="work-img">
                                <img src="{{ Storage::url('assets/images/projects/Progressive-web-thanawyahelwa.jpg') }}"
                                    alt="" class="img-fluid w-100">
                            </div>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Thanawya Helwa Team</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Web Development</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="https://thanawyahelwa.org" target="_blank">Open</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work-box">
                        <a href="{{ Storage::url('assets/images/projects/csharp-memoryAllocator.jpg') }}"
                            data-gall="portfolioGallery" class="venobox">
                            <div class="work-img">
                                <img src="{{ Storage::url('assets/images/projects/Progressive-csharp-memoryAllocator.jpg') }}"
                                    alt="" class="img-fluid w-100">
                            </div>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Memory Allocator</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Software Engineering</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="https://github.com/OmarTaherSaad/MemoryAllocator"
                                            target="_blank">Open</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work-box">
                        <a href="{{ Storage::url('assets/images/projects/csharp-sectionLibrary.jpg') }}"
                            data-gall="portfolioGallery" class="venobox">
                            <div class="work-img">
                                <img src="{{ Storage::url('assets/images/projects/Progressive-csharp-sectionLibrary.jpg') }}"
                                    alt="" class="img-fluid w-100">
                            </div>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Steel Sections Selector for Civil Engineers</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Software Engineering</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work-box">
                        <a href="{{ Storage::url('assets/images/projects/radiobanner.jpg') }}"
                            data-gall="portfolioGallery" class="venobox">
                            <div class="work-img">
                                <img src="{{ Storage::url('assets/images/projects/radioposter.jpg') }}" alt=""
                                    class="img-fluid w-100">
                            </div>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Banner for Radio episode</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Graphic Design</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="https://www.behance.net/gallery/96867831/-Negative-Sertonin"
                                            target="_blank">Open</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work-box">
                        <a href="{{ Storage::url('assets/images/projects/motiongraphics.png') }}"
                            data-gall="portfolioGallery" class="venobox">
                            <div class="work-img">
                                <img src="{{ Storage::url('assets/images/projects/motiongraphics.png') }}" alt=""
                                    class="img-fluid w-100">
                            </div>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Motion Graphics Video for Thanawya Helwa</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Video Editing</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="https://www.youtube.com/watch?v=YgU0mJlXOzY" target="_blank">Open</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Portfolio END --}}
    {{-- Contact --}}
    <section class="paralax-mf bg-image route"
        style="background-image: url({{ Storage::url('assets/images/BGs/bg3.jpg') }})">
        <div class="overlay-mf"></div>
        <div class="container-fluid {{ App::isLocale('ar') ? 'text-right' : 'text-left' }}" id="contact">
            <div class="row">
                <div class="col-12">
                    <div class="jumbotron mt-lg-3 mt-5">
                        <h1 class="display-4">{{ __("I'll be glad to recieve your message") }}</h1>
                        <p class="lead">{{ __("It's hard to answer immediately, but I will do as fast as possible") }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-light pb-5">
                <!--Contact Form START-->
                <div class="col-12 col-xl-8">
                    <form action="{{ route('contact-submit') }}" method="POST" id="ContactForm">
                        @csrf
                        <div class="row">
                            <div class="col-12 my-2">
                                <div class="form-group my-1 {{ old('name') ? 'focused' : '' }}">
                                    <label for="name">{{ __("Name") }}</label>
                                    <input
                                        class="form-control {{ $errors->has('name') ? 'is-danger filled invalid' : (old('name') ? 'filled valid' : '') }}"
                                        type="text" name="name" value="{{ old('name') }}" required>
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xl-6 col-12 my-2">
                                <div class="form-group my-1 {{ old('phone') ? 'focused' : '' }}">
                                    <label for="phone">{{ __("Mobile Number") }}</label>
                                    <input
                                        class="form-control {{ $errors->has('phone') ? 'is-danger filled invalid' : (old('phone') ? 'filled valid' : '') }}"
                                        type="tel" name="phone" value="{{ old('phone') }}" required pattern="[0-9]{5,}">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xl-6 col-12 my-2">
                                <div class="form-group my-1 {{ old('email') ? 'focused' : '' }}">
                                    <label for="email">{{ __("Email Address") }}</label>
                                    <input
                                        class="form-control {{ $errors->has('email') ? 'is-danger filled invalid' : (old('email') ? 'filled valid' : '') }}"
                                        type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 my-2">
                                <div class="form-group my-1 {{ old('subject') ? 'focused' : '' }}">
                                    <label for="subject">{{ __("What are you sending me about?") }}</label>
                                    <input
                                        class="form-control {{ $errors->has('subject') ? 'is-danger filled invalid' : (old('subject') ? 'filled valid' : '') }}"
                                        type="text" name="subject" value="{{ old('subject') }}" required>
                                </div>
                                @error('subject')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 my-2 justify-content-center">
                                <div class="form-group my-1 {{ old('message') ? 'focused' : '' }}">
                                    <label for="message">@lang("Message")</label>
                                    <textarea
                                        class="form-control {{ $errors->has('message') ? 'is-danger filled invalid' : (old('message') ? 'filled valid' : '') }}"
                                        name="message" rows="4" required>{{ old('message') }}</textarea>
                                </div>
                                @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 justify-content-center">
                                <input class="btn btn-secondary" type="submit" value="@lang(" Send")">
                            </div>
                        </div>
                    </form>

                </div>
                <!--Contact Form END-->
            </div>
        </div>
    </section>
    {{-- Contact END --}}


@endsection
@section('scripts')
<script src="{{ mix('js/home.js') }}"></script>
@endsection
