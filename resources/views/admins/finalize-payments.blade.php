@extends('layouts.app')
@section('title','All Users-Appointments for Courses')
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
        <h2>All Users-Appointments for Courses</h2>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead class="thead-inverse">
                <tr>
                    <th>Course</th>
                    <th>User Email</th>
                    <th>User Mobile Number</th>
                    <th>Appointment Starts at</th>
                    <th>Appointment Ends at</th>
                    <th>Appointment Schedule</th>
                    <th>Appointment Location</th>
                    <th>Is Paid</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse( $appointments as $appointment )
                <tr>
                    <td>{{ $appointment->appointment->course->name }}</td>
                    <td>{{ $appointment->user->email }}</td>
                    <td>{{ $appointment->user->mobile_number }}</td>
                    <td>{{ $appointment->appointment->start_for_humans }}</td>
                    <td>{{ $appointment->appointment->end_for_humans }}</td>
                    <td>{{ $appointment->appointment->schedule }}</td>
                    <td>
                        {{ $appointment->appointment->location }}
                        @if(!is_null($appointment->appointment->location_link))
                            <a href="{!! $appointment->location_link !!}" class="btn btn-info">Open</a>
                        @endif
                    </td>
                    <td>{{ $appointment->paid ? 'Yes' : 'No' }}</td>
                    <td>
                        <form action="{{ route('admin.finalize-payments-action', ['appointment_user' => $appointment]) }}" onsubmit="return confirm('Are you sure that {{ $appointment->user->name }} paid for the course {{ $appointment->appointment->course->name }}');" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info">User Paid</button>
                        </form>
                        <a href="{{ route('entrance-card', ['AppointUser' => $appointment]) }}"
                            class="btn btn-secondary">Entrance
                            Card</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">No Upcoming Appointments.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection