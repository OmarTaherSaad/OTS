@extends('layouts.app')
@section('title','Courses | Modules Dashboard')
@section('content')
<div class="row my-1">
    <div class="col-12 col-md-auto">
        <a href="{{ route('course.index') }}" class="btn btn-primary">
            <i class="icon icon-arrow-left"></i>&nbsp; All Courses
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-12">
                <h2>View & Change any course's modules</h2>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="courseSelect">Choose a Course</label>
                    </div>
                    <select class="custom-select" id="courseSelect" onchange="location = this.value;">
                        <option selected disabled>Choose..</option>
                        @foreach ($courses as $key => $name)
                        <option value="{{ route("course.modules", ["course" => $key]) }}" @isset($course)
                            {{ $course->id == $key ? 'selected' : '' }} @endisset>
                            {{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Modules Table --}}
            @isset($course)
            <div class="col-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="tableSearch" placeholder="Search for a module">
                </div>
                <div class="table-responsive-md">
                    <table class="table table-hover table-striped table-bordered text-center" id="modulesTable">
                        <thead>
                            <tr>
                                <th scope="col">Module Name</th>
                                <th scope="col">Order</th>
                                <th scope="col">is Prerequisite</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($coursemodules)
                            @forelse ($coursemodules as $module)
                            <tr>
                                <td>{{ $module->name }}</td>
                                <td>{{ $module->pivot->order }}</td>
                                <td>{{ $module->pivot->is_prereq ? 'Yes' : 'No' }}</td>
                                <td>{{ $module->updated_at->format('d-m-Y h:i A') }}</td>
                                @isset($course)
                                @can('update', $course)
                                <td>
                                    <a href="{{ route('coursemodule.edit',['coursemodule' => $module->pivot]) }}"
                                        class="btn btn-primary">Edit</a>
                                </td>
                                @else
                                <td>can't edit</td>
                                @endcan
                                @can('delete', $course)
                                <td>
                                    <form method="POST"
                                        action="{{ route('coursemodule.delete',['coursemodule' => $module->pivot]) }}"
                                        onsubmit="return confirm('Are you sure you want to delete {{ $module->name }} from this course?');">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Delete" />
                                    </form>
                                </td>
                                @endcan
                                @endisset
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6"><span class="font-weight-bold h5">No data Available</span></td>
                            </tr>
                            @endforelse
                            @endisset
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        {!! $coursemodules->links() !!}
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </div>
    @isset($course)
    {{-- New Module Form --}}
    <div class="col-12 col-md-6 border-left border-secondary">
        <h2>Add New Module for {{ $course->name }}</h2>
        <form action="{{ route('coursemodule.store') }}" method="POST">
            @csrf
            <input type="number" name="course" value="{{ $course->id }}" required hidden>

            <div class="form-group">
                <label for="module">{{ __('Module') }}</label>
                <select class="form-control @error('module') is-invalid @enderror" name="module" required>
                    <option selected disabled>Select module</option>
                    @foreach ($modules as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('module')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Order in course</span>
                </div>
                <input type="number" class="form-control" aria-label="order" name="order">
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="is_prereq" id="is_prereq" value="1">
                    Is Prerequisite
                </label>
            </div>


            <button type="submit" class="btn btn-primary">Add Module</button>
        </form>
    </div>
    @endisset
</div>
@endsection

@section('scripts')
@vite(['resources/js/forms.js'])
<script defer>
    $("#tableSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#modulesTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>
@endsection
