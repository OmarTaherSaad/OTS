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
<div class="row">
    <div class="col-10">
        <table class="table table-bordered">
            <thead class="thead-inverse">
                <tr>
                    <th>Starts at</th>
                    <th>Ends at</th>
                    <th>Schedule</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse( $appointments as $appointment )
                <tr>
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
                        <a href="{{ route('course.enroll', $appointment) }}" class="btn btn-success">Enroll in this Appointment</a>
                        @can('update', $appointment)
                        <a href="{{ $appointment->getLinkToEdit() }}" class="btn btn-secondary">Edit</a>
                        @endcan
                        @can('delete', $appointment)
                        <form method="POST" action="{{ $appointment->getLinkToDelete() }}" class="form-inline"
                            onsubmit="return confirm('Are you sure you want to delete {{ $appointment->name }} ?');">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No Appointments.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
