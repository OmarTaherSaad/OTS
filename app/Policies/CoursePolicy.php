<?php

namespace App\Policies;

use App\Models\Course;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;


    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }


    /**
     * Determine whether the user can view any courses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the course.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Course  $course
     * @return mixed
     */
    public function view(?User $user, Course $course)
    {
        return true;
    }

    /**
     * Determine whether the user can create courses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the course.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Course  $course
     * @return mixed
     */
    public function update(User $user, Course $course)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the course.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Course  $course
     * @return mixed
     */
    public function delete(User $user, Course $course)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the course.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Course  $course
     * @return mixed
     */
    public function restore(User $user, Course $course)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the course.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ATA\Course  $course
     * @return mixed
     */
    public function forceDelete(User $user, Course $course)
    {
        return false;
    }

    public function manageAppointments(User $user, Course $course)
    {
        return false;
    }

    public function buy(User $user, Course $course)
    {
        return true;
    }
}
