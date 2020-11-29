@extends('layouts.app')

@section('title','Courses - ' . $course->name)
@section('content')
<div class="row my-1">
    <div class="col-12 col-md-auto">
        <a href="{{ route('course.index') }}" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;
            All Courses</a>
    </div>
</div>
<section class="bg-gradient container-fluid">
    <div class="row justify-content-center">
        <div class="col-8 col-md-6 my-1 text-center">
            <h1>{{ $course->name }}</h1>
            <h4>Duration: {{ $course->duration_for_humans }}</h4>
            <h4>price: {{ $course->price_for_humans }}</h4>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 text-center">
            <a href="{{ route("course.appointments", $course) }}" class="btn btn-primary">Enroll</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 content">
            <p>
                {!! $course->description !!}
            </p>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 text-center">
            <a href="{{ route("course.appointments", $course) }}" class="btn btn-primary">Enroll</a>
        </div>
    </div>
</section>

@endsection