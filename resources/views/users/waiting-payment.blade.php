@extends('layouts.app')

@section('title','Waiting for Payment')
@section('head')
<style>
    .btnLg {
        padding: 1rem;
        font-size: 1.5em;
        height: 100%;
        width: 100%;
    }

</style>
@endsection
@section('content')
<div class="row my-1">
    <div class="col-12 col-md-auto">
        <a href="{{ route('users.courses', ['user' => auth()->user()]) }}" class="btn btn-primary"><i
                class="fas fa-arrow-alt-circle-left"></i>&nbsp; My Courses</a>
    </div>
</div>
<section class="bg-gradient">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 content">
            <h2 class="text-center">We are waiting for your payment to finalize the payment to verify your enrollment.</h2>
            <div class="row justify-content-center text-center mt-5">
                <div class="col-auto">
                    <img src="{{ Storage::url('assets/images/vodafone-cash.jpg') }}" alt="" width="200">
                    <h3>
                        Payment Method: Vodafone Cash
                        <br>
                        Transfer {{ $appointment->course->price_for_humans }} to the number <h2 class="font-weight-bold">+2010 1183 6776</h2>
                    </h3>
                    <h3>then send a WhatsApp message to the same number, with your registered Email Address ({{ $user->email }}).</h3>
                    <h6>One of our team will update your payment status within 1-2 days, and your entrance card will be available to you.</h6>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
