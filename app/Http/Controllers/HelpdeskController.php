<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AppointmentUser;
use App\Models\Course;
use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:training_academy_helpdesk');
    }

    public function dashboard()
    {
        $counts = [];
        $counts['courses'] = Course::count();
        return view('courses-systems.helpdesk.dashboard', compact('counts'));
    }

    public function entrance_card_scanner(Request $request)
    {
        return view('courses-systems.helpdesk.entrance-card-scanner');
    }

    public function entrance_card_scanned(AppointmentUser $appointmentUser)
    {
        $paid = $appointmentUser->paid ? 'Yes' : 'No';
        return response()->json([
            'success' => true,
            'enterURL' => route('helpdesk.entrance-card-enter', $appointmentUser),
            'data' => '
            <div class="table-responsive">
            <table class="table table-bordered">
            <thead class="thead-inverse">
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Course</td>
                    <td>' . $appointmentUser->appointment->course->name . '</td>
                </tr>
                <tr>
                    <td>User Email</td>
                    <td>' . $appointmentUser->user->email . '</td>
                </tr>
                <tr>
                    <td>User Mobile Number</td>
                    <td>' . $appointmentUser->user->mobile_number . '</td>
                </tr>
                <tr>
                    <td>Appointment Entrances</td>
                    <td>' . $appointmentUser->entrance_count . '</td>
                </tr>
                <tr>
                    <td>Appointment Starts at</td>
                    <td>' . $appointmentUser->appointment->start_for_humans . '</td>
                </tr>
                <tr>
                    <td>Appointment Ends at</td>
                    <td>' . $appointmentUser->appointment->end_for_humans . '</td>
                </tr>
                <tr>
                    <td>Appointment Location</td>
                    <td>' . $appointmentUser->appointment->location . '</td>
                </tr>
                <tr>
                    <td>Is Paid</td>
                    <td>' . $paid . '</td>
                </tr>
            </tbody>
        </table>
        </div>
            '
        ]);
    }

    public function entrance_card_enter(AppointmentUser $appointmentUser)
    {
        $appointmentUser->update([
            'entrance_count' => $appointmentUser->entrance_count + 1
        ]);
        return response()->json([
            'success' => true,
            'message' => "Done!"
        ]);
    }
}
