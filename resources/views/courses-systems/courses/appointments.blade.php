@extends('layouts.app')
@section('title', $course->name . ' | Available Appointments')
@section('content')
<div class="row">
    <div class="col-12 text-center">
        <h2>Available appointments for {{ $course->name }}</h2>
        @if(auth()->user()->isAdmin())
        <a href="{{ route('appointment.create') }}" class="btn btn-primary">Create Appointment</a>
        @endif
    </div>
</div>
<div class="row justify-content-center my-2">
    @forelse( $appointments as $appointment )
    <div class="col-12 col-md-6">
        @include('containers.appointment')
    </div>
    @empty
    <h4>No Appointments are available now.</h4>
    @endforelse
</div>
@endsection
