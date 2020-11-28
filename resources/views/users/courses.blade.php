@extends('layouts.app')
@section('title','My Appointments for Courses')
@section('head')
<style>
    .fit-content {
        white-space: nowrap;
        width: 1%;
    }

</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <h2>My Upcoming Appointments for Courses</h2>
    </div>
</div>
<div class="row">
    <div class="col-10 col-lg-8">
        <table class="table table-bordered">
            <thead class="thead-inverse">
                <tr>
                    <th>Course</th>
                    <th>Starts at</th>
                    <th>Ends at</th>
                    <th>Schedule</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse( $paid_appointments as $appointment )
                <tr>
                    <td><a href="{{ $appointment->course->getLinkToView() }}">{{ $appointment->course->name }}</a></td>
                    <td>{{ $appointment->end_for_humans }}</td>
                    <td>{{ $appointment->start_for_humans }}</td>
                    <td>{!! \Str::limit($appointment->schedule, 50) !!}</td>
                    <td>
                        {{ $appointment->location }}
                        @if(!is_null($appointment->location_link))
                            <a href="{!! $appointment->location_link !!}" class="btn btn-info">Open</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('entrance-card', ['AppointUser' => $appointment->pivot]) }}"
                            class="btn btn-secondary">Entrance
                            Card</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No Upcoming Appointments.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $paid_appointments->links() !!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2>My Previous Appointments for Courses</h2>
    </div>
</div>
<div class="row">
    <div class="col-10 col-lg-8">
        <table class="table table-bordered">
            <thead class="thead-inverse">
                <tr>
                    <th>Course</th>
                    <th>Starts at</th>
                    <th>Ends at</th>
                    <th>Schedule</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @forelse( $paid_old_appointments as $appointment )
                <tr>
                    <td><a href="{{ $appointment->course->getLinkToView() }}">{{ $appointment->course->name }}</a></td>
                    <td>{{ $appointment->end_for_humans }}</td>
                    <td>{{ $appointment->start_for_humans }}</td>
                    <td>{!! \Str::limit($appointment->schedule, 50) !!}</td>
                    <td>
                        {{ $appointment->location }}
                        @if(!is_null($appointment->location_link))
                            <a href="{!! $appointment->location_link !!}" class="btn btn-info">Open</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No Previous Appointments.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $paid_old_appointments->links() !!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2>Pending Appointments for Courses (Waiting Payment)</h2>
    </div>
</div>
<div class="row">
    <div class="col-10 col-lg-8">
        <table class="table table-bordered">
            <thead class="thead-inverse">
                <tr>
                    <th>Course</th>
                    <th>Starts at</th>
                    <th>Ends at</th>
                    <th>Schedule</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @forelse( $unpaid_appointments as $appointment )
                <tr>
                    <td><a href="{{ $appointment->course->getLinkToView() }}">{{ $appointment->course->name }}</a></td>
                    <td>{{ $appointment->end_for_humans }}</td>
                    <td>{{ $appointment->start_for_humans }}</td>
                    <td>{!! \Str::limit($appointment->schedule, 50) !!}</td>
                    <td>
                        {{ $appointment->location }}
                        @if(!is_null($appointment->location_link))
                            <a href="{!! $appointment->location_link !!}" class="btn btn-info">Open</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No Pending Appointments.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $unpaid_appointments->links() !!}
    </div>
</div>
<hr>
@endsection
