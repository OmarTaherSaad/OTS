@extends('layouts.app')
@section('title','OTS Helpdesk Panel')
@section('head')
<style>
    .btn {
        padding: 1rem;
        font-size: 1.5em;
        height: 100%;
        width: 100%;
    }

</style>
@endsection
@section('content')
<div class="m-2">
    <div class="row mt-2">
        <div class="col-12 col-md-8">
            <h2>AGECS OTS Helpdesk Panel</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Data & Insights</h4>
        </div>
        <div class="col-auto my-1">
            {{--View all courses--}}
            <a class="btn btn-primary" href="{{ route('course.index') }}">Courses <span
                    class="badge badge-pill badge-light">{{ $counts['courses'] }}</span></a>
        </div>
        <hr>
        <div class="col-12">
            <h4>Actions</h4>
        </div>
        <div class="col-auto my-1">
            {{-- License Maker --}}
            <a class="btn btn-primary" href="{{ route('ata-helpdesk.entrance-card-scanner') }}">Entrance Card
                Scanner</a>
        </div>
    </div>
</div>
@endsection
