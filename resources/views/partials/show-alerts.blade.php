@if ($message = Session::get('success'))

<div class="main-alert alert alert-success alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}"
	role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif


{{--System Errors--}}
@if ($errors->any())
<div class="main-alert alert alert-danger alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}"
	role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</strong>

</div>
@endif

@if ($message = Session::get('error'))

<div class="main-alert alert alert-danger alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}"
	role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('warning'))

<div class="main-alert alert alert-warning alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}"
	role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('info'))

<div class="main-alert alert alert-info alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}"
	role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif