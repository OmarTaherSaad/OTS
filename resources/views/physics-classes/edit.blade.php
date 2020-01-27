@extends('layouts.app')

@section('title',__('admin.Edit') . ': ' . $Project->name)

@section('head')
<link rel="stylesheet" href="{{ asset('css/summernote-bs4.css') }}"/>
@if (App::getLocale() == 'ar')
    <style>
        .custom-file-label::after {
            right: unset;
            left: 0;
        }
    </style>
@endif
@endsection


@section('content')
    <div class="row my-1">
        <div class="col-12 col-md-auto">
        <a href="/projects" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-{{ App::getLocale() == 'ar' ? 'right' : 'left' }}"></i>&nbsp; {{ __('admin.AllProjects') }}</a>
        </div>
    </div>

    <div class="row my-2 text-center">
        <div class="col">
            <h1>{{ $Project->name }}</h1>
        </div>
    </div>

    <div class="row justify-content-center mt-2"> 
        <div class="col-12 col-md-6">
        <form action="/admin/projects/{{ $Project->id }}" method="post" class="needs-validation" novalidate>

                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="name">{{ __('admin.ProjectName') }}</label>
                    <input type="text" name="name" class="form-control"  placeholder="{{ __('admin.ProjectName') }}" value="{{ $Project->name }}"  required >
                </div>

                <div class="form-group">
                    <label for="description">{{ __('admin.ProjectDesc') }}</label>
                <textarea name="description" class="form-control wysiwyg"  placeholder="{{ __('admin.ProjectDesc') }}" required >{{ $Project->description }}</textarea>
                </div>
                
                @if ($Project->Images->count() > 0)
                <div class="row">
                <div class="col-12">
                        <h6>{{ __('admin.ProjectImageToDelete') }}</h6>
                </div>
                @foreach ($Project->Images as $image)
                <div class="col-6 col-md-4">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="delete_files[]" value="{{ $image->filename }}" style="transform: scale(1.7)">
                            <img class="d-block w-100" src="{{ $image->filename }}">
                        </label>
                    </div>
                </div>
                @endforeach
                </div>
                @endif

                <!--Image input START-->
                <label for="images">{{ __('admin.ProjectImages') }}</label>
                <div class="input-group">
                    <span class="input-group-btn">
                                     <a data-input="thumbnail" data-preview="holder" class="btn btn-primary imageUpload">
                                       <i class="fa fa-picture-o"></i> {{ __('Choose') }}
                                     </a>
                                   </span>
                    <input id="thumbnail" class="form-control" type="text" name="images">
                </div>
                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                <!-- Image input END -->

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="{{ __('Submit') }}" />
                </div>
            </form>
        </div>
        
    </div>

@endsection

@section('scripts_down')
<script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/formvalidation.js') }}"></script>
<script src="{{ asset('js/stand-alone-button.js') }}"></script>
    @if (App::getLocale() == 'ar')
        <script src="{{ asset('js/lang/summernote-ar-AR.js') }}"></script>
    @endif

    <script>
        $(document).ready(function() {
            $('.imageUpload').filemanager('image');

            $('.wysiwyg').summernote({
                minHeight:  200,
                height:     400,
                maxHeight:  400,
                lang: ($('html').attr('lang') == 'ar') ? 'ar-AR' : 'en-US'
            });
            //Disable Image Upload
            $('.note-group-select-from-files').remove();
            $('input[type="file"]').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });
        });       
</script>
@endsection