<?php

namespace App\Policies;

use App\Models\Appointment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any appointments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Appointment  $appointment
     * @return mixed
     */
    public function view(User $user, Appointment $appointment)
    {
        return true;
    }

    /**
     * Determine whether the user can create appointments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Appointment  $appointment
     * @return mixed
     */
    public function update(User $user, Appointment $appointment)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Appointment  $appointment
     * @return mixed
     */
    public function delete(User $user, Appointment $appointment)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Appointment  $appointment
     * @return mixed
     */
    public function restore(User $user, Appointment $appointment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Appointment  $appointment
     * @return mixed
     */
    public function forceDelete(User $user, Appointment $appointment)
    {
        //
    }
}
