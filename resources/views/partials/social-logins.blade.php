<a href="{{ route('login-providers', ['provider' => 'google']) }}" class="m-3 btn" style="background-color: red; color: white;"><i class="fab fa-google"></i> Login with Google</a>
<a href="{{ route('login-providers', ['provider' => 'facebook']) }}" class="m-3 btn btn-primary"><i class="fab fa-facebook"></i> Login with Facebook</a>
@unless (Request::route()->named('register'))
<a href="{{ route('register') }}" class="m-3 btn btn-info">Register Manually</a>
@endunless