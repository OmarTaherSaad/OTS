@extends('layouts.app')
@section('title','Appointments | Add a New Appointment')
@section('content')
<div class="row my-1">
    <div class="col-12 col-md-auto">
        <a href="{{ route('appointment.index') }}" class="btn btn-primary">
            <i class="icon icon-arrow-left"></i>&nbsp; All Appointments
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-auto">
        <h2>Add a New Appointment</h2>
    </div>
</div>
<form action="{{ route('appointment.store') }}" method="POST" id="createForm">
    <div class="row justify-content-center mt-2">
        <div class="col-12 col-md-6">
            @csrf
            <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" name="course" id="course" required>
                    <option disabled selected>Select a Course</option>
                    @foreach ($courses as $id => $name)
                    <option value="{{ $id }}" @if($id==old('course') || (isset($course) && $course->id == $id)) selected
                        @endif>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_at">Starting Date</label>
                <input type="date" name="start_at" class="form-control" value="{{ old('start_at') }}" required>
            </div>
            <div class="form-group">
                <label for="end_at">End Date</label>
                <input type="date" name="end_at" class="form-control" value="{{ old('end_at') }}" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
            </div>
            <div class="form-group">
                <label for="location_link">Location URL</label>
                <input type="url" name="location_link" class="form-control" value="{{ old('location_link') }}">
            </div>
            <div class="form-group">
                <label for="max_attendees">Max Attendees (Zero means no limit)</label>
                <input type="number" min=0 name="max_attendees" class="form-control"
                    value="{{ old('max_attendees') ?? 0 }}" required>
            </div>
            <div class="form-group">
                <label>Schedule</label>
                <textarea class="form-control" name="schedule" required>{{ old('schedule') }}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
@vite(['resources/js/forms.js'])
@endsection
