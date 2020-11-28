<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{$course->name}}</h3>
        <p class="card-text">
            <h5>Level: <span class="font-weight-bold">{{ $course->difficulty_for_humans }}</span></h5>
            <h5>Max Attendees: <span class="font-weight-bold">{{ $course->max_attendees }}</span></h5>
            <h5>Duration: <span class="font-weight-bold">{{ $course->duration_for_humans }}</span></h5>
        </p>
        <a href="{{ $course->getLinkToView() }}" class="btn btn-primary">View</a>
        @can('update', $course)
        <a href="{{ $course->getLinkToEdit() }}" class="btn btn-secondary">Edit</a>
        @endcan
        @can('manageAppointments', $course)
        <a href="{{ $course->getLinkToManageAppointment() }}" class="btn btn-info">Manage Appointments</a>
        @endcan
        @can('manageModules', $course)
        <a href="{{ $course->getLinkToManageModules() }}" class="btn btn-dark">Manage Modules</a>
        @endcan
        @can('delete', $course)
        <form method="POST" action="{{ $course->getLinkToDelete() }}" class="form-inline"
            onsubmit="return confirm('Are you sure you want to delete {{ $course->name }} ?');">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Delete" />
        </form>
        @endcan
    </div>
</div>
