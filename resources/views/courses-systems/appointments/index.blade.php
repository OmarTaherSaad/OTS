@extends('layouts.app')
@section('title','All Appointments')
@section('content')
<div class="row justify-content-center text-center mt-5">
    <div class="col-12 col-6">
        <h1>Appointments of ATA Courses</h1>
        @auth
        @if(auth()->user()->isAdmin())
        <a href="{{ route('appointment.create') }}" class="btn btn-primary">Add Appointment</a>
        @endif
        @endauth
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <form action="{{ route('appointment.index') }}" method="get">
            <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" name="course" id="course">
                    <option value="">All</option>
                    @foreach ($courses as $id => $name)
                    <option value="{{ $id }}" @if(Request::has('course') && Request::get('course')==$id) selected
                        @endif>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    <div class="col-12 col-lg-10">
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
                @forelse( $appointments as $appointment )
                <tr>
                    <td>{{ $appointment->course->name }}</td>
                    <td>{{ $appointment->start_for_humans }}</td>
                    <td>{{ $appointment->end_for_humans }}</td>
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
                    <td colspan="">No Appointments.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $appointments->links() !!}
    </div>
</div>
@endsection
