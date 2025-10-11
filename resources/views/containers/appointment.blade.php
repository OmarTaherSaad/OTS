<div class="card">
    <div class="card-body">
        <h2 class="card-title">Appointment for: {{ $appointment->course->name }}</h2>
        <p class="card-text">
            <h4>Starts at: {{$appointment->start_for_humans}}</h4>
            <h4>Ends at: {{$appointment->end_for_humans}}</h4>
            <h5>Max. Attendees: {{ $appointment->max_attendees }}</h5>
            @if(auth()->check() && auth()->user()->isAdmin())
            <h5>Remaining seats: {{ $appointment->remainingSeats() }}</h5>
            @endif
            <hr>
            <h5 class="font-weight-bold">{!! $appointment->schedule !!}</h5>
            <hr>
            <h6>
                <i class="icon icon-map-pin" aria-hidden="true"></i>
                {{ $appointment->location }}
                @if(!is_null($appointment->location_link))
                    <a href="{!! $appointment->location_link !!}">(Open Link)</a>
                @endif
            </h5>
        </p>
        <a href="{{ route('course.enroll', $appointment) }}" class="btn btn-success">Enroll</a>
        @can('update', $appointment)
        <a href="{{ $appointment->getLinkToEdit() }}" class="btn btn-secondary">Edit</a>
        @endcan
        @can('delete', $appointment)
        <form method="POST" action="{{ $appointment->getLinkToDelete() }}"
            onsubmit="return confirm('Are you sure you want to delete {{ $appointment->name }} ?');">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Delete" />
        </form>
        @endcan
    </div>
</div>
