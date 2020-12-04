@extends('layouts.app')
@section('title','Admin Panel')
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
<div id="vueApp" class="m-2">
    <div class="row mt-2">
        <div class="col-12 col-md-8">
            <h2>OTS Admin Panel</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Data & Insights</h4>
        </div>
        <div class="col-auto my-1">
            {{--View all users--}}
            <a class="btn btn-primary" href="{{ route('admin.users') }}">Users</a>
        </div>
        <div class="col-auto my-1">
            {{--View all courses--}}
            <a class="btn btn-primary" href="{{ route('course.index') }}">Courses</a>
        </div>
        <div class="col-auto my-1">
            {{--View all appointments--}}
            <a class="btn btn-primary" href="{{ route('appointment.index') }}">Appointments</a>
        </div>
        <div class="col-auto my-1">
            {{-- Finalize Payments--}}
            <a class="btn btn-primary" href="{{ route('admin.finalize-payments') }}">Finalize Payments</a>
        </div>
        <div class="col-auto my-1">
            {{-- Entrance--}}
            <a class="btn btn-primary" href="{{ route('helpdesk.entrance-card-scanner') }}">Entrance</a>
        </div>
    </div>
</div>
@endsection