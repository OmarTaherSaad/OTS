<div class="card">
    <div class="card-body">
        <h3 class="card-title">Course: {{ $appointment->course->name }}</h3>
        <p class="card-text">
            <h5>Ends at:{{$appointment->end_for_humans}}</h5>
            <h5>Starts at: {{$appointment->start_for_humans}}</h5>
            <span class="font-weight-bold">{!! \Str::limit($appointment->schedule, 50) !!}</span>
        </p>
        <a href="{{ $appointment->getLinkToView() }}" class="btn btn-primary">View</a>
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
