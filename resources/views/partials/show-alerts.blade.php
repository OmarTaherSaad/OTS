@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}" role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>	

		<strong>{{ $message }}</strong>

</div>

@endif


{{--System Errors--}}
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}" role="alert">

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

<div class="alert alert-danger alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}" role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>	

		<strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}" role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>	

	<strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible fade show {{ App::getLocale() == 'ar' ? 'text-right' : '' }}" role="alert">

	<button type="button" class="close" data-dismiss="alert">×</button>	

	<strong>{{ $message }}</strong>

</div>

@endif