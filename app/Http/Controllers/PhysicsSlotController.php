<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPhysicsSlotRequest;
use App\PhysicsSlot;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class PhysicsSlotController extends Controller
{
    protected $TYPES, $CHAPTERS, $PLACES;
    public function __construct()
    {
        //$this->middleware('auth');
        //Share main data of Physics classes to all views
        view()->share('types', PhysicsSlot::getTypes());
        view()->share('chapters', PhysicsSlot::getChapters());
        view()->share('places', PhysicsSlot::getPlaces());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('physics-classes.index')->with('Slots',PhysicsSlot::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('physics-classes.create');
    }


    public function register()
    {
        return view('physics-classes.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPhysicsSlotRequest $request)
    {
        $validated = $request->validated();

        if ($validated['isRange']) {

        }
        return response()->json($validated['isRange']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhysicsSlot  $Slot
     * @return \Illuminate\Http\Response
     */
    public function show(PhysicsSlot $Slot)
    {
        return view('physics-classes.show')->with(compact('Slot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhysicsSlot  $Slot
     * @return \Illuminate\Http\Response
     */
    public function edit(PhysicsSlot $Slot)
    {
        return view('physics-classes.edit')->with(compact('Slot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhysicsSlot  $Slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhysicsSlot $Slot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhysicsSlot  $Slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhysicsSlot $Slot)
    {
        //
    }
}
