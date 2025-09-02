<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourseRequest;
use App\Models\Course;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Course::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses-systems.courses.index')->with('courses', Course::paginate(config('app.pagination_max')));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ATA\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $appointments = $course->appointments->filter(function ($appointment) {
            return $appointment->hasEmptyPlace();
        });
        return view('courses-systems.courses.show', compact('course'))->with(compact('appointments'));
    }



    public function appointments_view(Course $course)
    {
        $appointments = $course->appointments->filter(function ($appointment) {
            return $appointment->hasEmptyPlace();
        });
        return view('courses-systems.courses.appointments', [
            'appointments' => $appointments,
            'course' => $course
        ]);
    }
}
