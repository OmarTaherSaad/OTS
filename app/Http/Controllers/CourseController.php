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
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('role:admin')->except(['index', 'show', 'appointments_view']);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses-systems.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        $course = Course::create($request->all());
        session()->flash('success', 'Course Saved Successfully!');
        return redirect()->route('course.show', $course);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ATA\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses-systems.courses.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ATA\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCourseRequest $request, Course $course)
    {
        $course->update($request->all());
        session()->flash('success', 'Course Updated Successfully!');
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ATA\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('success', 'Course Deleted Successfully!');
        return redirect()->route('course.index');
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
