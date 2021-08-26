@extends('layouts.app')
@section('title',__('Physics Classes Booking'))
@section('head')
<link rel="stylesheet" href="{{ mix('css/forms.css') }}">
@if(App::isLocale('ar'))
<style>
    label:not(.form-check-label) {
        right: 5px;
    }
</style>
@endif
@section('content')
<div class="container-fluid {{ App::isLocale('ar') ? 'text-right' : 'text-left' }} mt-lg-0 mt-5">
    <div class="row">
        <div class="col-12">
            <div class="jumbotron mt-lg-3 mt-5">
                <h1 class="display-4">{{ __("حجز حصص الفيزياء مع عمر طاهر سعد") }}</h1>
                <p class="lead">{{ __("هكون سعيد إني أشرحلك الفيزياء بشكل مُبسط وأحل معاك مسائل لحد ما أتأكد إنك فعلًا فهمت") }}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
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
                        <input class="btn btn-primary" type="submit" value="@lang(" Send")">
                    </div>
                </div>
            </form>

        </div>
        <!--Contact Form END-->
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('js/forms.js') }}" defer></script>
@endsection