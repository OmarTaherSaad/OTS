<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class CreateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Appointment::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course'    => 'required|exists:courses,id',
            'start_at'  => 'required|date',
            'end_at'    => 'required|date|after:start_at',
            'schedule'  => 'required|string',
            'max_attendees' => 'required|integer|min:0',
            'location' => 'required|string',
            'location_link' => 'required|url'
        ];
    }

    public function attributes()
    {
        return [
            'start_at' => 'Start Date',
            'end_at' => 'End Date',
            'max_attendees' => 'Max. Attendees',
            'location_link' => 'Location URL'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (Course::find($this->course)->max_attendees < $this->max_attendees) {
                $validator->errors()->add('Max. Attendees', "Appointment maximum attendees cannot be more than course's maximum attendees!");
            }
        });
    }
}
