@extends('layouts.app')
@section('title', 'Courses | Edit Course-Module Link')
@section('content')
    <div class="row my-1">
        <div class="col-12 col-md-auto">
            <a href="{{ route('course.modules') }}" class="btn btn-primary">
                <i class="icon icon-arrow-left"></i>&nbsp; All Course-Module Links
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-auto">
            <h2>Edit Course-Module Link</h2>
            <h4>Course: {{ $coursemodule->course->name }}</h4>
            <h4>Module: {{ $coursemodule->module->name }}</h4>
        </div>
    </div>
    <form action="{{ route('coursemodule.update', $coursemodule->course) }}" method="POST">
        <div class="row justify-content-center mt-2">
            <div class="col-12 col-md-6">
                @csrf
                @method('PATCH')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Order in course</span>
                    </div>
                    <input type="number" class="form-control" aria-label="order" name="order"
                        value="{{ $coursemodule->order }}">
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="is_prereq" id="is_prereq" value="1"
                            @checked($coursemodule->is_prereq)>
                        Is Prerequisite
                    </label>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @vite(['resources/js/forms.js'])
    <script defer>
        $(document).ready(function() {
            $('.textEditor').summernote({
                minHeight: 150
            });
        });
    </script>
@endsection
