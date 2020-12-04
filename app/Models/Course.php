<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name', 'description', 'max_attendees', 'duration', 'price'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getLinkToView()
    {
        return route('course.show', ['course' => $this]);
    }

    public function getLinkToEdit()
    {
        return route('course.edit', ['course' => $this]);
    }

    public function getLinkToUpdate()
    {
        return route('course.update', ['course' => $this]);
    }
    public function getLinkToDelete()
    {
        return route('course.destroy', ['course' => $this]);
    }
    public function getLinkToEnroll()
    {
        return route("course.appointments", ['course' => $this]);
    }

    public function getLinkToManageAppointment()
    {
        return route('appointment.create', ['course' => $this]);
    }

    public function getLinkToManageModules()
    {
        return route('course.modules', ['course' => $this]);
    }

    public function getDurationAttribute($value)
    {
        return \Carbon\CarbonInterval::hours($value);
    }
    public function getDurationForHumansAttribute()
    {
        return $this->duration;
    }

    public function getPriceForHumansAttribute()
    {
        if ($this->price == 0)
            return "For Free";
        return $this->price . ' L.E.';
    }
}
