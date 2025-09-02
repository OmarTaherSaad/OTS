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
