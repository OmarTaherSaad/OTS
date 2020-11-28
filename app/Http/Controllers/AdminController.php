<?php

namespace App\Http\Controllers;

use App\Models\AppointmentUser;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function users()
    {
        return view('users.index', ['users' => User::paginate(config('app.pagination_max'))]);
    }

    public function finalize_payments()
    {
        $appointments = AppointmentUser::all();
        return view('admins.finalize-payments', compact('appointments'));
    }

    public function finalize_payments_action(AppointmentUser $appointment_user)
    {
        $appointment_user->update(['paid' => true]);
        session()->flash('success', 'Operation was done successfully!');
        return back();
    }
}
