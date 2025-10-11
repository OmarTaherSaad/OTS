@extends('layouts.app')

@section('title','Appointments - ' . $appointment->name)

@section('head')
@vite(['resources/sass/app.scss'])
@endsection

@section('content')
<div class="row my-1">
    <div class="col-12 col-md-auto">
        <a href="{{ route('appointment.index') }}" class="btn btn-primary"><i
                class="icon icon-arrow-left"></i>&nbsp;
            All Appointments</a>
    </div>
</div>
<section class="bg-gradient">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 content">
            <h1 class="text-center">Appointment for "{{ $appointment->course->name }}" Course</h1>
            <div class="row justify-content-center">
                <div class="col-10 col-md-6 text-left">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Starts at:</td>
                                <td>{{ $appointment->start_at->format("jS of F, Y g:i a") }}</td>
                            </tr>
                            <tr>
                                <td>Ends at:</td>
                                <td>{{ $appointment->end_at->format("jS of F, Y g:i a") }}</td>
                            </tr>
                            <tr>
                                <td>Location:</td>
                                <td>{{ $appointment->location }}</td>
                            </tr>
                            <tr>
                                <td>Schedule:</td>
                                <td>{{ $appointment->schedule }}</td>
                            </tr>
                            <tr>
                                <td>Maximum Attendees number:</td>
                                <td>{{ $appointment->max_attendees }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('appointment.edit', $appointment) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
