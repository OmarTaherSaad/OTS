@extends('layouts.app')
@section('title', 'My Skills')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-10">
                <v-grid
                    theme="darkCompact"
                    :source="rows"
                    :columns="columns"
                    ></v-grid>
            </div>
        </div>
    </div>
@endsection