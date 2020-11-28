@extends('layouts.app')
@section('title','Faculty Member Upgrade Request')
@section('head')
<link rel="stylesheet" href="{{ mix('css/forms.css') }}" />
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-md-auto">
        <h2>Faculty Member Upgrade Request</h2>
    </div>
</div>
<form action="{{ route('request-upgrade',$user) }}" method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center mt-2">
        <div class="col-12 col-md-6">
            @csrf
            <div class="form-group">
                <label>Choose an image for a document that proves you are a faculty member.</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file" id="file" accept="image/*"
                        required>
                    <label class="custom-file-label" for="file">Choose an image</label>
                </div>
                <small class="form-text text-muted">It must be a valid image with maximum size of 10MB.</small>
                <small class="form-text text-muted">Allowed Formats: jpeg,jpg,png,gif</small>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
        </div>
    </div>
</form>
<div id="result"></div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('js/forms.js') }}" defer></script>
@endsection
