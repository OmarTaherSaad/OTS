@extends('layouts.app')
@section('title','Appointment Entrance Card Scanner')
@section('head')
<style>
    .btn {
        padding: 1rem;
        font-size: 1.5em;
        height: 100%;
        width: 100%;
    }

</style>
@endsection
@section('content')
<div class="row" id="app">
    <div class="col-10">
        <h2>Appointment Entrance Card Scanner</h2>
        <qrcode-stream @decode="cardScanned"></qrcode-stream>
        <h3 v-html="response"></h3>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ mix('js/entrance-card-scanner.js') }}"></script>
@endsection
