<?php

namespace App\Http\Requests;

use App\PhysicsSlot;
use App\Rules\ChapterExist;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddPhysicsSlotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //'booked', 'mobile_number', 'place', 'address', 'students', 'fees', 'content', 'chapters', 'type'
        return [
            'isRange' => 'required|boolean',
            'date' => 'required_unless:isRange,true|sometimes|date|after_or_equal:today',
            'start_date' => 'required_if:isRange,true|sometimes|date|after_or_equal:today',
            'end_date' => 'required_if:isRange,true|sometimes|date|after_or_equal:today',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'isBooked' => 'required|boolean',
            'chapters' => ['required_if:isBooked,true|array|sometimes', new ChapterExist],
            'HelpType' => ['required_if:isBooked,true|sometimes', Rule::in(PhysicsSlot::getTypesKeys())],
            'place' => ['required_if:isBooked,true|sometimes', Rule::in(PhysicsSlot::getPlacesKeys())],
            'fees' =>'required_if:isBooked,true|sometimes',
            'mobile_no' =>'required_if:isBooked,true|sometimes',
            'students' =>'required_if:isBooked,true|sometimes',
            'address' =>'required_if:isBooked,true|sometimes',
            'content' =>'nullable|string'
        ];
    }
}
