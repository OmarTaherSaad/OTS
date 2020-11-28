<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Entrance Card for Course: {{ $AppointUser->appointment->course->name }}</title>
        <link href="{{ public_path('css/appointment-entrance-card.css')}}" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid" style="margin:0; padding:0;">
            <div class="row">
                <div style="float:left; width: 50%">
                    <img src="{{ public_path('storage\images\assets\logo.svg') }}" class="img-fluid" alt="AGECS">
                </div>
                <div style="width: 50%; float:right;">
                    <h2 style="text-align: center;">AGECS Training Academy</h2>
                    <h3><em>Entrance Card</em>
                        <br>
                        Course: {{ $appointment->course->name }}
                        <br>
                        Name: {{ $AppointUser->user->name }}
                        <br>
                        Email: {{ $AppointUser->user->email }}
                    </h3>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center" style="text-align: center;">
                <div class="col-12 col-md-10">
                    {!! $AppointUser->getQR() !!}
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 content">
                    <h1 class="text-center">Appointment for "{{ $appointment->course->name }}" Course</h1>
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-6 text-left">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Starts at:</td>
                                        <td>{{ $appointment->start_at->format("jS \of F, Y g:i A") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ends at:</td>
                                        <td>{{ $appointment->end_at->format("jS \of F, Y g:i A") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Location:</td>
                                        <td>{{ $appointment->location }}</td>
                                    </tr>
                                    <tr>
                                        <td>Schedule:</td>
                                        <td>{{ $appointment->schedule }}</td>
                                    </tr>
                                    <tr>
                                        <td>Paid:</td>
                                        <td>{{ $AppointUser->paid ? 'Yes' : 'No' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div style="float:left; width: 70%">
                    AGECS
                </div>
                <div style="float:right; width: 30%;">
                    <b>Issued at: {{ $AppointUser->created_at->toDateString() }}</b>
                </div>
            </div>
        </div>
    </body>

</html>
