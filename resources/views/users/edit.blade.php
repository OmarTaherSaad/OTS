@extends('layouts.app')

@section('title')
@if(Auth::user()->is($user))
Edit your Profile
@else
Edit "{{ $user->name }}" profile
@endif
@endsection
@section('head')
<link rel="stylesheet" href="{{ mix('css/forms.css') }}">
@endsection
@section('content')
<div class="row justify-content-center" id="app">
    <div class="col-12 col-md-6">
        <div class="card">
            @if(Auth::user()->is($user))
            <div class="card-header">Edit your Profile</div>
            @else
            <div class="card-header">
                Edit "{{ $user->name }}" profile
            </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('users.edit',$user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group focused">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" pattern="^([a-zA-Z].+\s).+$"
                            class="form-control @error('name') filled is-invalid @enderror" name="name"
                            value="{{ $user->name }}" autocomplete="name" autofocus>
                        <small class="form-text text-muted">It should be at least 2 names, without any
                            numbers/symbols.</small>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group focused">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control filled @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email }} (Cannot be changed)" autocomplete="email" readonly disabled>
                    </div>
                    <div class="form-group @isset($user->mobile_number) focused @endisset">
                        <label for="mobile_number">{{ __('Mobile Number') }}</label>
                        <input id="mobile_number" type="text" pattern="^01[0-9]{9}"
                            class="form-control @isset($user->mobile_number) filled @endisset  @error('mobile_number') is-invalid @enderror" name="mobile_number"
                            value="{{ $user->mobile_number }}" required>
                        <small class="form-text text-muted">It should be a valid mobile number (11 numbers starting with 01 & without + sign).</small>
                        @error('mobile_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {!! $user->getImage("w-25") !!}
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image"
                            accept="image/*" data-max-size="1">
                        <label class="custom-file-label" for="profile_picture">Choose Profile Picture (Square Image,
                            Maximum 2 MB)</label>
                    </div>

                      <img id="preview" src="#" alt="your image" />

                    <div class="form-group">
                        <label for="password">{{ __('New Password') }}</label>
                        <input id="password" v-bind:type="show_password ? 'text' : 'password'"
                            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])$"
                            class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        <small class="form-text text-muted">Choose a strong password; at least 8 characters, and it
                            must contain at least 1 number, 1 lowercase character and 1 uppercase character</small>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirm the new password') }}</label>
                        <input id="password_confirmation" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" autocomplete="new-password">
                        <small class="form-text text-muted">It must match the password above.</small>
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    @if(auth()->user()->isAdmin())
                    {{-- Role --}}
                    <div class="form-group">
                        <select class="form-control" name="role" id="role" required>
                            <option disabled selected>Choose Account Type</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role }}" @if($user->role === $role) selected
                                @endif>{{ \Str::title(str_replace('_',' ',$role)) }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    @endif

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
        <br>
        @can('delete',$user)
        <a class="text-danger" data-toggle="modal" data-target="#deleteModal" href="#">
            @if(Auth::user()->is($user))
            Delete My Account
            @else
            Delete "{{ $user->name }}" Account
            @endif
        </a>
        @endcan
    </div>
</div>
@can('delete',$user)
<div class="modal" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if(!Auth::user()->is($user))
                    Delete "{{ $user->name }}" Account
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm" method="POST" action="{{ route('users.delete-user',['user' => $user ]) }}">
                <div class="modal-body">
                    @if(Auth::user()->is($user))
                    <h3>Are you sure you want to delete your account?</h3>
                    <h4 class="font-weight-bold text-danger">Note that this action may make you lose all your purchased
                        courses permanently.</h4>
                    @else
                    <h3>Are you sure you want to delete this account?</h3>
                    <h4 class="font-weight-bold text-danger">Note that this action will make the account owner lose all
                        his/her purchased courses permanently.</h4>
                    @endif
                    <div class="form-group focused">
                        <label for="password">Password Confirmation</label>
                        <input type="password" name="password" class="form-control filled" placeholder="Enter Your Password"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan
@endsection
@section('scripts')
<script>
    $('#preview').hide();
    $("#toggle_show_password").on('click', function(event) {
        event.preventDefault();
        switch ($('#password').attr("type")) {
            case "text":
                $('#password').attr('type', 'password');
                $(this).find('i').removeClass( "fa-eye-slash" ).addClass('fa-eye');
                break;
            case "password":
                $('#password').attr('type', 'text');
                $(this).find('i').addClass( "fa-eye-slash" ).removeClass('fa-eye');
                break;
        }
    });

    var password = document.getElementById("password")
    , confirm_password = document.getElementById("password_confirmation");

    function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    $('form').submit(function(){
        var val = true;

        $('input[type=file][data-max-size]').each(function(){
            if(typeof this.files[0] !== 'undefined'){
                var max = parseInt($(this).attr('data-max-size'),10) * 1024 * 1024,
                mySize = this.files[0].size;
                val = max > mySize;
                return val;
            }
        });
        if (!val)
        {
            alert("File size is more than allowed.");
            document.body.classList.remove("loading");
        }
        return val;
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').show();
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#image").change(function() {
        readURL(this);
    });
    $("#image").blur(function() {
        if ($("#image")[0].files.length == 0)
            $('#preview').hide();
    });
</script>
<script type="text/javascript" src="{{ mix('js/forms.js') }}" defer></script>
@endsection
