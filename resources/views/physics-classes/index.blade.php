@extends('layouts.app')

@section('title',__('Physics Classes Slots'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($Slots->count() == 0)
            <h2>@lang("I'm sorry, but no slots available for now!")</h2>
            @endif
            @foreach ($Slots as $Slot)
            <div class="col-12 col-md-4 my-1">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <h5 class="card-title">{{ $Slots->date }} -> {{ $Slots->time }}</h5>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="/projects/{{ $Project->id }}/{{ str_slug($Project->name) }}"
                                        class="btn btn-secondary btn-block">{{ __('admin.Open') }}</a>
                                    @auth
                                    <a href="/admin/projects/{{ $Project->id }}/edit"
                                        class="btn btn-warning btn-block">{{ __('admin.Edit') }}</a>
                                    <form method='POST' action='/admin/projects/{{ $Project->id }}' class="btn-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-block">{{ __('admin.Delete') }}</button>
                                    </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
