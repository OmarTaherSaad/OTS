@extends('layouts.app')
@section('title',__('About Me'))
@section('head')
<link rel="stylesheet" href="{{ mix('css/about.css') }}">
@endsection
@section('scripts-First')
<script src="{{ mix('js/about.js') }}"></script>
@endsection
@section('content')
{{-- Titles --}}
<div class="container-fluid">
    <div class="row justify-content-center parallax position-relative pb-md-5 pb-2">
        <div class="overlay progressive replace"></div>
        <div class="col-8 col-sm-6 col-md-3">
            <prog-img src="{{ asset('storage/photos/photo1.jpg') }}" alt="Omar Taher's photo"
                vclass="rounded-circle img-fluid"></prog-img>
        </div>
        <div class="col" v-view="titlesShown">
            @lang('main.aboutMeHeader')
            <ul class="list-group titles {{ App::isLocale('ar') ? 'rtl' : '' }}"
                v-bind:class="{'sidenav': titleOnSide}" ref="titles" v-scroll-spy-active
                v-scroll-spy-link="{selector: 'li'}">
                <li href="#webDeveloper" class="list-group-item" v-bind:class="{'h4': !titleOnSide}">
                    <span v-if="titleOnSide">{{ __('Web Developer') }}</span>
                    <span v-else>{{ __('Full Stack Web Developer') }}</span>
                </li>
                <li href="#cSharpDeveloper" class="list-group-item" v-bind:class="{'h4': !titleOnSide}">
                    @lang("C# Developer")
                </li>
                <li href="#videoEditor" class="list-group-item" v-bind:class="{'h4': !titleOnSide}">
                    @lang("Video Editor")
                </li>
                {{-- <li href="#graphicDesigner" class="list-group-item" v-bind:class="{'h4': !titleOnSide}">Graphic Designer
                </li> --}}
                <li href="#CSEstudent" class="list-group-item" v-bind:class="{'h4': !titleOnSide}">
                    <span v-if="titleOnSide">{{ __('CSE Student') }}</span>
                    <span v-else>{{ __('Computer & Systems Engineering Student') }}</span>
                </li>
                <li href="#youTuber" class="list-group-item" v-bind:class="{'h4': !titleOnSide}">
                    <span v-if="titleOnSide">@lang('YouTuber')</span>
                    <span v-else>
                        @lang('main.youtuberLong')
                    </span>
                </li>
                <li href="#physicsTutor" class="list-group-item" v-bind:class="{'h4': !titleOnSide}">@lang("Physics Tutor")</li>
            </ul>
        </div>
    </div>
</div>
{{-- Content --}}
<div class="container-fluid" v-scroll-spy="{offset: 150, allowNoActive: true}">
    {{-- Web Development --}}
    <div id="webDeveloper" class="row parallax bg-primary pt-4 px-md-0 px-3">
        <h1 class="text-light px-4">@lang("Full Stack Web Developer")</h1>
        <div class="col-12 text-center text-light">
            <h3 class="text-dark bg-light rounded p-3 mx-auto" style="width: fit-content">@lang("Technologies I use in Web Development")</h3>
            <div class="row justify-content-center">
                <div v-for="item in skills.web" class="col-4 col-md-2">
                    <prog-img :src="item.img" :alt="item.title" vclass="m-2 rounded img-fluid skill">
                    </prog-img>
                    <h4>@{{ item.title }}</h4>
                </div>
            </div>
        </div>
        {{-- Previous Web Work --}}
        <div class="col-12 text-center text-light py-3">
            <h3>@lang("Previous Work")</h3>
            <div class="row justify-content-center">
                <div v-for="item in work.web" class="col-12 col-md-4 my-md-0 my-1">
                    <div class="card">
                        <prog-img class="card-img" :src="item.img" :alt="item.titleEN"></prog-img>
                        <div class="card-img-overlay" @click="openLink(item.href)">
                            <div class="workOverlay"></div>
                            @if (App::isLocale('ar'))
                            <h5 class="card-title">@{{ item.titleAR }}</h5>
                            @else
                            <h5 class="card-title">@{{ item.titleEN }}</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- C# Developer --}}
    <div class="row parallax position-relative">
        <div class="overlay progressive replace"></div>
        <div class="col">
            <section id="cSharpDeveloper" class="pt-4">
                <h1 class="px-4">@lang("C# Developer")</h1>
                <div class="row">
                    <div class="col-12 text-center text-dark">
                        <h3 class="text-light bg-dark rounded p-3 mx-auto" style="width: fit-content">@lang("Technologies & Frameworks I use in C# Development")</h3>
                        <div class="row justify-content-around">
                            <div v-for="item in skills.csharp" class="col-4 col-md-2">
                                <prog-img :src="item.img" :alt="item.title" vclass="m-2 rounded img-fluid skill dark">
                                </prog-img>
                                <h4 v-html="item.title"></h4>
                            </div>
                        </div>
                    </div>
                    {{-- Previous C# Work --}}
                    <div class="col-12 text-center text-dark py-3">
                        <h3>@lang('Previous Work')</h3>
                        <div class="row justify-content-center">
                            <div v-for="item in work.csharp" class="col-12 col-md-4 my-md-0 my-1">
                                <div class="card text-light">
                                    <prog-img class="card-img" :src="item.img" :alt="item.title"></prog-img>
                                    <div class="card-img-overlay no-pointer"
                                        {{--@click="window.open(item.href,'_blank')"--}}>
                                        <div class="workOverlay"></div>
                                        <h5 class="card-title">@{{ item.title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- Video Editor --}}
    <div id="videoEditor" class="row parallax bg-light text-dark pt-4 px-md-0 px-3">
        <h1 class="px-4">@lang('Video Editor')</h1>
        <div class="col-12 text-center">
            <h3 class="text-light bg-dark rounded p-3 mx-auto" style="width: fit-content">@lang('What I do in Video Editing')</h3>
            <div class="row justify-content-center">
                <div v-for="item in skills.videoEditing" class="col-6 col-md-3">
                    <prog-img :src="item.img" :alt="item.titleEN" vclass="m-2 rounded img-fluid skill dark">
                    </prog-img>
                    @if (App::isLocale('ar'))
                    <h4>@{{ item.titleAR }}</h4>
                    <p v-html="item.descAR"></p>
                    @else
                    <h4>@{{ item.titleEN }}</h4>
                    <p v-html="item.descEN"></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- CSE Student --}}
    <div class="row parallax position-relative">
        <div class="overlay progressive replace"></div>
        <div class="col">
            <section id="CSEstudent" class="pt-4">
                <h1 class="px-4">@lang('Computer & Systems Engineering Student')</h1>
                <div class="row justify-content-center">
                    <div class="col-10 col-md-6 my-2">
                        <h4><i class="fas fa-map-marked-alt fa-lg">
                                <a href="https://goo.gl/maps/gwRRR8g3QXTYmkS57" target="_blank" rel="noreferrer" aria-label="Faculty of Engineering, Ain Shams University">
                            </i> @lang('Faculty of Engineering, Ain Shams University')
                            </a>
                        </h4>
                    </div>
                    <div class="col-10 col-md-6 my-2">
                        <h4><i class="fas fa-graduation-cap fa-lg">
                            </i> @lang('To be graduated in 2020')
                        </h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-dark">
                        <h3 class="text-light bg-dark rounded p-3 mx-auto" style="width: fit-content">
                            @lang('Some of Courses I have completed')
                        </h3>
                        <div class="row justify-content-center">
                            <div v-for="item in skills.cse" class="col-6 col-md-2">
                                <prog-img :src="item.img" :alt="item.title" vclass="m-2 rounded img-fluid skill dark">
                                </prog-img>
                                <h5 v-html="item.title"></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <h4 class="font-weight-bold">
                            @lang('And many others, of course.')
                        </h4>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- YouTuber --}}
     <div id="youTuber" class="row parallax bg-primary pt-4 px-md-0 px-3 justify-content-center">
        <h1 class="text-light px-4">@lang('YouTuber')</h1>
        <div class="col-12 text-center text-light">
            <h3 class="text-dark bg-light rounded p-3 mx-auto" style="width: fit-content">@lang('My YouTube Channel in 20 seconds')</h3>
        </div>
        <div class="col-10 col-md-8">
            <h5 class="loadingIframe"></h5>
            <div class="embed-responsive embed-responsive-16by9 iframeProgressive" hidden></div>
        </div>
    </div>
    {{-- Physics Tutor --}}
    {{-- Margins at bottom (mb-*) are because of footer  --}}
    <div class="row parallax position-relative mb-5 mb-md-3">
        <div class="overlay progressive replace"></div>
        <div class="col">
            <section id="physicsTutor" class="pt-4">
                <h1 class="px-4">@lang("Physics Tutor (For High School student in Cairo, Egypt)")</h1>
                <div class="row justify-content-center">
                    <div class="col-6 col-md-4 my-2 text-center">
                        <i class="fas fa-clock fa-5x mb-4"></i>
                        <h4>
                            @lang("Accurate Appointment")
                        </h4>
                        <p>@lang("I always arrive in time!")</p>
                    </div>
                    <div class="col-6 col-md-4 my-2 text-center">
                        <i class="fas fa-brain fa-5x mb-4"></i>
                        <h4>
                            @lang("Understand First")
                        </h4>
                        <p>@lang("You must understand the scientific concept, for solving problems or memorizing rules.")</p>
                    </div>
                    <div class="col-6 col-md-4 my-2 text-center">
                        <i class="fas fa-redo fa-5x mb-4"></i>
                        <h4>
                            @lang("Again till you Explain")
                        </h4>
                        <p>@lang("I will never pass a point unless I am sure you understood it 100%")</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script defer>
    //Animate "loadingIframe" text
    i = 0;
    @if(App::isLocale('ar'))
    text = "جاري إحضار الفيديو";
    @else
    text = "Getting video";
    @endif
    var interval = setInterval(function() {
    $(".loadingIframe").html(text+Array((++i % 4)+1).join("."));
    if (i===10)
        @if(App::isLocale('ar'))
        text = "جاري إحضار الفيديو";
        @else
        text = "Getting video";
        @endif
    }, 500);

    $('.iframeProgressive').each(function(i,element) {
        var iframe = document.createElement('iframe');
        iframe.onload = function() {
            clearInterval(interval);
            $(element).siblings('.loadingIframe').remove();
            element.removeAttribute('hidden');
        };
        $(iframe).attr({
            frameborder: 0,
            allow: "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture",
            allowfullscreen: true,
            class: "embed-responsive-item",
            title: "Introductory video for Omar Taher's youtube channel"
        })
        iframe.src = "https://www.youtube.com/embed/nOWOaLBYkJI";
        element.appendChild(iframe);
    });
</script>
@endsection