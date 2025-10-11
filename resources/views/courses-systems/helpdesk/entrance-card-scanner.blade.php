@extends('layouts.app')
@section('title','Appointment Entrance Card Scanner')
@section('content')
<div class="row" id="app">
    <div class="col-10">
        <h2>Appointment Entrance Card Scanner</h2>
        <qrcode-stream style="height: 50vh;" @decode="cardScanned" ref="qrScanner"></qrcode-stream>
        <div v-html="response"></div>
    </div>
    <div class="col-12" v-show="canEnter">
        <button class="btn btn-primary" @click="enter">Enter</button>
    </div>
</div>
@endsection
@section('scripts')
@vite(['resources/js/entrance-card-scanner.js'])
@endsection
