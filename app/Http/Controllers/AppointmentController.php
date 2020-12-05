<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAppointmentRequest;
use App\Models\Appointment;
use App\Models\AppointmentUser;
use App\Models\Course;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Appointment::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'course' => 'nullable|exists:courses,id'
        ]);
        $appointments = Appointment::query();
        if ($request->filled('course')) {
            $appointments = $appointments->whereHas('course', function ($query) use ($request) {
                $query->where('id', $request->course);
            });
        }
        $appointments = $appointments->orderBy('created_at', 'desc')->paginate(config('app.pagination_max'));
        $courses = Course::all()->pluck('name', 'id');
        return view('courses-systems.appointments.index', [
            'appointments' => $appointments,
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $course = null;
        if ($request->has('course')) {
            $request->validate([
                'course' => 'exists:courses,id'
            ]);
            $course = Course::find($request->course);
        }
        return view('courses-systems.appointments.create')->with('courses', Course::pluck('name', 'id'))->with(compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAppointmentRequest $request)
    {
        Course::find($request->course)->appointments()->create($request->all());
        session()->flash('success', 'Appointment Saved!');
        return redirect()->route('appointment.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('courses-systems.appointments.edit', compact('appointment'))->with('courses', Course::pluck('name', 'id'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());
        session()->flash('success', 'Appointment Updated!');
        return redirect()->route('appointment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        session()->flash('success', 'Appointment Deleted Successfully!');
        return redirect()->route('appointment.index');
    }

    public function entrance_card(AppointmentUser $AppointUser)
    {
        return $AppointUser->getEntranceCard();
    }

    public function enroll(Appointment $appointment)
    {
        if (auth()->user()->mobile_number == null) {
            session()->flash('warning', 'Kindly enter your mobile number first, then when your save your data, you will be enrolled in the course automatically');
            session()->put('appointment', $appointment->id);
            return redirect()->route('users.edit', auth()->user());
        }
        auth()->user()->appointments()->attach($appointment);
        session()->flash('success', 'You are now enrolled! kindly finish the payment to be able to get your Entrance Card.');
        return view('users.waiting-payment', ['appointment' => $appointment]);
    }
}
