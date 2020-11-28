<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile_number', 'image', 'provider', 'provider_id', 'password', 'additional_data'
    ];

    public static $roles = [
        'user', 'admin', 'super_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'additional_data' => 'collection'
    ];

    public function appointments()
    {
        return $this->belongsToMany("App\Models\Appointment")->using(\App\Models\AppointmentUser::class)->withPivot(['id', 'paid', 'invoice_data'])->withTimestamps();
    }

    public function getRoleNameAttribute()
    {
        return \Str::title(str_replace("_", " ", $this->role));
    }

    public function hasRole($role)
    {
        return $this->role == $role;
    }

    public function isAdmin()
    {
        return $this->hasRole('admin') || $this->isSuperAdmin();
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super_admin');
    }

    public function getImage($classes = "img-fluid", $size = null)
    {
        return '<img alt="' . $this->name . '" src="' . $this->image . '" class="' . $classes . '" ' . (is_null($size) ? '' : 'width="' . $size)  . '" />';
    }
}
