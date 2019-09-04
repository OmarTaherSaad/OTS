@extends('layouts.app')

@section('title',_("Media & Interviews"))

@section('head')
<style>
    .card-header button {
        font-size: 1.3em;
        color: #d24536;
    }

    .card-header button:hover {
        text-decoration: none;
        color: #6d65ae;
    }

    .card-header button:focus {
        text-decoration: none;
    }
    .thumbnail {
        border-radius: 20px;
        min-width: 20vh;
        min-height: 20vh;
        border-radius: 20px;
        height: 100%;
        width: 100%;
        transition: 0.5s ease;
        background-color: rgba(255, 255, 255, 1);
    }

    .thumbnail:hover {
        background-color: rgba(210, 69, 54, 1);
        cursor: pointer;
    }

    .thumbnail:hover .thumbnail-text {
        font-size: 150%;
        color: black;
        font-weight: bolder;
    }

    .thumbnail-text {
        position: absolute;
        top: 50%;
        left: 50%;
        width: inherit;
        transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        text-align: center;
        font-size: 130%;
        font-weight: bold;
        color: #d24536;
        transition: 0.4s ease;
    }

    .thumbnail-text:hover {
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<div class="container py-3">
    <div class="row justify-content-center mt-5 mt-md-0">
        <div class="col-12 text-center">
            <h2>{{ __("My Interviews in TV & Other Media") }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 m-md-2 m-1 text-center">
            <div class="accordion" id="TV">
                @foreach($Items->where('typeCode','tv') as $item)
                <div class="card">
                    <div class="card-header" id="TVheading{{ $loop->index }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#TVcollapse{{ $loop->index }}" aria-expanded="false"
                                aria-controls="collapse{{ $loop->index }}">
                                @if(App::isLocale('ar'))
                                {{ $item->nameAR }}
                                @else
                                {{ $item->nameEN }}
                                @endif
                            </button>
                        </h5>
                    </div>

                    <div id="TVcollapse{{ $loop->index }}" class="collapse"
                        aria-labelledby="TVheading{{ $loop->index }}" data-parent="#TV" i-src="{{ $item->link }}"
                        index="{{ $loop->index }}">
                        <div class="card-body">
                            <div class="i-loader">
                                <h5 class="loading"></h5>
                                <div class="lds-ellipsis">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="embed-responsive embed-responsive-16by9 p-3" id="TV{{ $loop->index }}" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @foreach ($Items->where('typeCode','written') as $item)
        <div class="col-5 col-md-2 m-md-2 m-1 thumbnail text-center overlay">
            <a href="{{ $item->link }}" class="thumbnail-text" target="_blank" rel="noreferrer">
                @if(App::isLocale('ar'))
                {{ $item->nameAR }}
                @else
                {{ $item->nameEN }}
                @endif
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script defer>
    //Animate "loading" text
    i = 0;
    @if(App::isLocale('ar'))
    text = "جاري إحضار الفيديو";
    @else
    text = "Getting video";
    @endif
    var interval = setInterval(function() {
    $(".loading").html(text+Array((++i % 4)+1).join("."));
    if (i===10)
        @if(App::isLocale('ar'))
        text = "جاري إحضار الفيديو";
        @else
        text = "Getting video";
        @endif
        //If all iframes loaded, stop the interval
        if ($(".loading").length < 1) {
            clearInterval(interval);
        }
    }, 500);

    $("#TV").on('show.bs.collapse',function(e) {
        const el = $(e.target);
        if (el.has('iframe').length) {
            return;
        }
        var iframe = document.createElement('iframe');
        iframe.onload = function() {
            el.find('.i-loader').remove();
            document.getElementById('TV'+el.attr('index')).removeAttribute('hidden');
        };
        iframe.src = $(e.target).attr('i-src');
        document.getElementById('TV'+$(e.target).attr('index')).appendChild(iframe);
    });
    //Thumbnail clicks the link inside it
    $(".thumbnail").click(function() {
        window.open($(this).find('a').attr('href'),'_blank');
    })
</script>
@endsection