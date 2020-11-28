@extends('layouts.app')
@section('title','Courses | Edit Course')
@section('content')
<div class="row my-1">
    <div class="col-12 col-md-auto">
        <a href="{{ route('course.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-alt-circle-left"></i>&nbsp; All Courses
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-auto">
        <h2>Edit Course</h2>
    </div>
</div>
<form action="{{ route('course.update', ['course' => $course]) }}" enctype="multipart/form-data" method="POST">
    <div class="row justify-content-center mt-2">
        <div class="col-12 col-md-10">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" maxlength="200" class="form-control" value="{{ $course->name }}" required>
            </div>

            <div class="form-group">
              <label for="">Max. Attendees</label>
              <input type="number" name="max_attendees" class="form-control" min="0"
                value="{{ $course->max_attendees }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration in Hours</label>
                <input type="number" name="duration" class="form-control" value="{{ $course->duration->totalHours }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price in L.E.</label>
                <input type="number" name="price" class="form-control" value="{{ $course->price }}" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea id="textEditor" name="description">{!! $course->description !!}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('js/forms.js') }}" defer></script>
<script src="{{ asset('texteditor/ckeditor.js') }}"></script>
<script defer>
    CKEDITOR.replace('textEditor');
</script>
@endsection
