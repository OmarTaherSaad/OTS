@extends('layouts.app')
@section('title', $appointment->name())
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center" style="text-align: center;">
        <div class="col-12 col-md-6">
            <h2 style="text-align: center;">OTS Courses</h2>
            <h3><em>Entrance Card</em>
                <br>
                Course: {{ $appointment->course->name }}
                <br>
                Name: {{ $AppointUser->user->name }}
                <br>
                Email: {{ $AppointUser->user->email }}
            </h3>
        </div>
        <div class="col-12 col-md-10">
            {!! $AppointUser->getQR() !!}
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 content">
            <h1 class="text-center">{{ $appointment->name() }}</h1>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>Starts at:</td>
                        <td>{{ $appointment->start_at->format("jS \of F, Y g:i A") }}</td>
                    </tr>
                    <tr>
                        <td>Ends at:</td>
                        <td>{{ $appointment->end_at->format("jS \of F, Y g:i A") }}</td>
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
                        <td>Paid:</td>
                        <td>{{ $AppointUser->paid ? 'Yes' : 'No' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div>
        <div style="float:left; width: 70%">
            OTS - OmarTaherSaad.com
        </div>
        <div style="float:right; width: 30%;">
            <b>Issued at: {{ $AppointUser->created_at->toDateString() }}</b>
        </div>
    </div>
</div>
@endsection