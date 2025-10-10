@extends('layouts.app')
@section('title', 'Home')
@section('head')
    <link href="{{ mix('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="bg-image" id="mainSection"
        style="background-image: url({{ Storage::url('assets/images/BGs/bg4.webp') }});">
        <div class="container-fluid my-auto">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12 text-center">
                    <h3 class="text-light">Hello there!</h3>
                    <h1 class="text-light font-weight-bolder mb-4">I am Omar Taher Saad</h1>
                    <h2 class="text-light"><span class="text-slider-items">Computer Engineer,Full Stack Web
                            Developer,Founder of Thanawya Helwa, YouTube Content Creator</span><strong
                            class="text-slider"></strong></h2>
                    <p class="pt-3"><a class="btn btn-primary js-scroll px-4" href="#about" role="button">Learn
                            More</a></p>
                </div>
            </div>
        </div>
    </section>
    {{-- About Section --}}
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5">
                                        <div class="about-img">
                                            <img src="{{ Storage::url('assets/images/Personal Photo.webp') }}"
                                                class="img-fluid rounded b-shadow-a" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="about-info">
                                            <p><span class="title-s">Name: </span> <span>Omar Taher Saad</span></p>
                                            <p><span class="title-s">Profile: </span> <span>Computer Engineer</span></p>
                                            <p><span class="title-s">Email: </span>
                                                <span><a
                                                        href="mailto:{{ config('app.contact_email') ?? 'contact@omartahersaad.com' }}">{{ config('app.contact_email') ?? 'contact@omartahersaad.com' }}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="skills-container">
                                    <!-- Skills will be rendered here by JavaScript -->
                                </div>

                                <script>
                                    window.skillsData = {!! json_encode($skills) !!};
                                </script>
                            </div>
                            <div class="col-md-6">
                                <div class="about-me pt-4 pt-md-0">
                                    <div class="title-box-2">
                                        <h5 class="title-left">
                                            About Me
                                        </h5>
                                    </div>
                                    <p class="lead">
                                        I'm Omar Taher Saad, a Software Engineer & Full Stack Web Developer, with expertise
                                        in many programming languages like <strong>PHP, Python, C++, and C#</strong>.
                                        <br>
                                    </p>
                                    <p class="lead">
                                        Challenges I dealt with:
                                    <ul>
                                        <li>Payment Gateways Integrations</li>
                                        <li>API integrations</li>
                                        <li>UI Designing</li>
                                        <li>Full website development from scratch</li>
                                        <li>Webhooks</li>
                                    </ul>
                                    </p>
                                    <p class="lead">
                                        Web development:
                                    <ul>
                                        <li>PHP Laravel</li>
                                        <li>Vue.js</li>
                                        <li>WordPress</li>
                                        <li>WooCommerce</li>
                                        <li>Bootstrap</li>
                                        <li>jQuery</li>
                                    </ul>
                                    </p>
                                    <p class="lead">
                                        Some of the APIs I Connected:
                                    <ul>
                                        <li><b>Payments:</b> Stripe - PayPal - Paymob - Tap - Fawry - National Bank of Egypt
                                            -
                                            Banque Misr</li>
                                        <li><b>Messaging:</b> Twilio - Cequens - Zipwhip - Telnyx</li>
                                        <li><b>POS:</b> Cova - Flowhub - Vend</li>
                                        <li><b>KYC:</b> Sumsub</li>
                                        <li><b>Others:</b> Kraken - Egyptian eInvoicing - Telegram - Jandrozd</li>
                                    </ul>
                                    </p>
                                    <p class="lead">
                                        I'm committed to deadlines, having the ability to finish tasks exactly as it was
                                        told to me, without any delays, and
                                        with the flexibility to additional small edits.
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
    {{-- Services Section START --}}
    <section id="service" class="pb-5">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-12 text-center">
                    <h2 class="font-weight-bold text-uppercase text-dark">Services</h2>
                    <h4>Here's what I can offer to you ..</h4>
                    <div class="line"></div>
                </div>
            </div>
            <div class="row justify-content-around pb-5 my-2">
                @foreach ($services as $service)
                    <div class="col-md-3 col-sm-6 col-12 my-2">
                        <div class="service-box h-100">
                            <div class="service-ico">
                                <span class="ico-circle"><i class="{{ $service['icon'] }}"></i></span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">{{ $service['title'] }}</h2>
                                <p class="s-description text-center">
                                    {{ $service['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Section END --}}

    {{-- APIs Section START --}}
    <section id="apis" class="pb-5">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-12 text-center">
                    <h2 class="font-weight-bold text-uppercase text-dark">Some of the APIs I Connected</h2>
                    <div class="line"></div>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="logo-container h-100">
                    <div class="row align-items-center h-100">
                        <div class="logo-container rounded">
                            <div class="slider">
                                <div class="logos">
                                    @foreach ($logos as $logo)
                                        <img src="{{ Storage::url($logo) }}" class="img-fluid rounded logo mx-2"
                                            height="200" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>
    {{-- APIs Section END --}}

    {{-- Portfolio --}}
    <section id="work" class="bg-image"
        style="background-image: url({{ Storage::url('assets/images/BGs/bg1.webp') }}); box-shadow: inset 0 0 0 2000px rgba(104,157,255, 0.8);">
        <div class="container-fluid py-5">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="font-weight-bold text-uppercase text-light">Previous Work</h2>
                    <h4>Some of my previous work</h4>
                </div>
            </div>
            <div class="row justify-content-center my-3">
                @foreach ($projects as $project)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-1">
                        <div class="work-box h-100">
                            <a href="{{ $project['img'] }}" data-gall="portfolioGallery" class="venobox">
                                <div class="work-img">
                                    <img src="{{ $project['img_progressive'] }}" alt="" class="img-fluid">
                                </div>
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="font-weight-bold">{{ $project['title'] }}</h4>
                                            <small class="text-primary">{{ $project['category'] }}</small>
                                        </div>
                                        <div class="col-12">
                                            @if (array_key_exists('link', $project))
                                                <a href="{{ $project['link'] }}" target="_blank">Open</a>
                                            @else
                                                <p class="font-italic font-weight-bold">Confidential.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Portfolio END --}}
    {{-- Contact --}}
    <section class="paralax-mf bg-image"
        style="background-image: url({{ Storage::url('assets/images/BGs/bg3.webp') }}); box-shadow: inset 0 0 0 2000px rgba(68,68,68, 0.8);">
        <div class="container-fluid text-left" id="contact">
            <div class="row justify-content-around">
                <div class="col-12 col-md-6">
                    <div class="jumbotron mt-lg-3 mt-5">
                        <h2>{{ __("I'll be glad to recieve your message") }}</h2>
                        <p class="lead">{{ __("It's hard to answer immediately, but I will do as fast as possible") }}
                        </p>
                    </div>
                </div>
                <!--Contact Form START-->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 text-light pb-5">
                    <form class="needs-validation" novalidate action="{{ route('contact-submit') }}" method="POST"
                        id="ContactForm">
                        @csrf
                        <div class="row">
                            <div class="col-12 my-2">
                                <div class="form-group my-1 {{ old('name') ? 'focused' : '' }}">
                                    <label for="name">{{ __('Name') }}</label>
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
                                    <label for="phone">{{ __('Mobile Number') }}</label>
                                    <input
                                        class="form-control {{ $errors->has('phone') ? 'is-danger filled invalid' : (old('phone') ? 'filled valid' : '') }}"
                                        type="tel" name="phone" value="{{ old('phone') }}" required>
                                </div>
                            </div>

                            <div class="col-xl-6 col-12 my-2">
                                <div class="form-group my-1 {{ old('email') ? 'focused' : '' }}">
                                    <label for="email">{{ __('Email Address') }}</label>
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
                                    <label for="subject">{{ __('What are you sending me about?') }}</label>
                                    <input
                                        class="form-control {{ $errors->has('subject') ? 'is-danger filled invalid' : (old('subject') ? 'filled valid' : '') }}"
                                        type="text" name="subject" value="{{ old('subject') }}" minlength="5"
                                        required>
                                </div>
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 my-2 justify-content-center">
                                <div class="form-group my-1 {{ old('message') ? 'focused' : '' }}">
                                    <label for="message">@lang('Message')</label>
                                    <textarea
                                        class="form-control {{ $errors->has('message') ? 'is-danger filled invalid' : (old('message') ? 'filled valid' : '') }}"
                                        name="message" rows="4" minlength="10" required>{{ old('message') }}</textarea>
                                </div>
                                @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 justify-content-center">
                                <input class="btn btn-secondary" type="submit" value="@lang(' Send')">
                            </div>
                        </div>
                        <!-- Hidden reCAPTCHA response field -->
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                    </form>

                </div>
                <!--Contact Form END-->
            </div>
        </div>
    </section>
    {{-- Contact END --}}


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.site_key') }}"></script>
    <script>
        grecaptcha.ready(function() {
            var form = document.getElementById('ContactForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                grecaptcha.execute('{{ config('captcha.site_key') }}', {
                    action: 'contact'
                }).then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token;
                    form.submit();
                });
            });
        });
    </script>
    <script src="{{ mix('js/home.js') }}"></script>
    <script src="{{ mix('js/skills.js') }}"></script>
    <script src="{{ mix('js/forms.js') }}"></script>
@endsection
