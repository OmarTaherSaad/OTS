<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'schedule', 'start_at', 'end_at', 'max_attendees', 'location', 'location_link'
    ];

    protected $casts = [
        'start_at' => 'date',
        'end_at' => 'date'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(\App\Models\AppointmentUser::class)->withPivot(['id', 'paid', 'invoice_data'])->withTimestamps();
    }

    public function getStartForHumansAttribute()
    {
        return $this->start_at->format('d-m-Y');
    }
    public function getEndForHumansAttribute()
    {
        return $this->end_at->format('d-m-Y');
    }

    public function name()
    {
        return "Appointment for " . $this->course->name . " Course";
    }

    public function getNameAttribute()
    {
        return "Starts at " . $this->start_for_humans . ", " . $this->schedule;
    }

    public function getLinkToView()
    {
        return route('appointment.show', ['appointment' => $this]);
    }

    public function getLinkToEdit()
    {
        return route('appointment.edit', ['appointment' => $this]);
    }

    public function getLinkToUpdate()
    {
        return route('appointment.update', ['appointment' => $this]);
    }
    public function getLinkToDelete()
    {
        return route('appointment.destroy', ['appointment' => $this]);
    }

    public function getLinkToBuy()
    {
        //return route('cart.course-setup', ['appointment' => $this]);
    }

    public function remainingSeats()
    {
        return $this->max_attendees - $this->users()->count();
    }

    public function hasEmptyPlace()
    {
        return $this->users()->count() < $this->max_attendees;
    }

    public function isFull()
    {
        return !$this->hasEmptyPlace();
    }
}
