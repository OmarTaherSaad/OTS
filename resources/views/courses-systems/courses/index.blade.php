@extends('layouts.app')
@section('title','All Courses')
@section('content')
<div class="row justify-content-center text-center mt-5">
    <div class="col-12 col-6">
        <h1>Courses of ATA</h1>
        @auth
            @if(auth()->user()->isAdmin())
            <a href="{{ route('course.create') }}" class="btn btn-primary">Add Course</a>
            @endif
        @endauth
    </div>
</div>
<div class="row">
    @forelse( $courses as $course )
    <div class="col-12 col-md-4">
        @include('containers.course')
    </div>
    @empty
    <div class="col-12 text-center">
        <h4>Currently, No courses are available.</h4>
    </div>
    @endforelse
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $courses->links() !!}
    </div>
</div>
@endsection
