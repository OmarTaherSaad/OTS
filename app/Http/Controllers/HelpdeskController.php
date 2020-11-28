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
        return view('ata.helpdesk.dashboard', compact('counts'));
    }

    public function entrance_card_scanner(Request $request)
    {
        return view('ata.helpdesk.entrance-card-scanner');
    }

    public function entrance_card_enter(AppointmentUser $appointmentUser)
    {
        return json_encode($appointmentUser);
    }
}
