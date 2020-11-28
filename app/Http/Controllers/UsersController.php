<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Appointment;
use App\Models\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(User::class, 'user');
    }

    public function home()
    {
        $courses = Course::all();
        return view("users.home")->with(compact('courses'));
    }

    public function courses()
    {
        $user = auth()->user();
        $paid_appointments = $user->appointments()->orderBy('start_at', 'desc')->wherePivot('paid', true)->whereDate('end_at', '>=', \Carbon\Carbon::now())->paginate(config('app.pagination_max'));
        $paid_old_appointments = $user->appointments()->orderBy('start_at', 'desc')->wherePivot('paid', true)->whereDate('end_at', '<', \Carbon\Carbon::now())->paginate(config('app.pagination_max'));
        $unpaid_appointments = $user->appointments()->orderBy('start_at', 'desc')->wherePivot('paid', false)->paginate(config('app.pagination_max'));
        return view('users.courses')
            ->with(compact('paid_appointments'))
            ->with(compact('paid_old_appointments'))
            ->with(compact('unpaid_appointments'));
    }

    public function courses_wait(User $user, Appointment $appointment)
    {
        return view('users.waiting-payment', ['user' => $user, 'appointment' => $appointment]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('app.pagination_max'));
        return view('users.index')->with(compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')
            ->with('roles', User::$roles)
            ->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only(['name', 'mobile_number']);
        //Store Image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if (\Storage::exists($user->image)) {
                \Storage::delete($user->image);
            }
            $imgPath = $request->file('image')->storeAs(
                "avatars",
                \Str::uuid() . '.' . $request->file('image')->extension()
            );
            $user->update([
                'image' => \Storage::url($imgPath)
            ]);
        }
        //Avoid being locked: if user to edit is the last admin, and we are trying to make him non-admin -> NOT ALLOWED
        if (
            auth()->user()->isSuperAdmin() //This is an admin
            && auth()->user()->is($user) //He is the user to edit
            && User::where('role', 'super_admin')->count() == 1 //And he is the last admin
            && $data['role'] != 'super_admin' //And new role is not 'admin'!
        ) {
            session()->flash('error', 'You can\'t make yourself a non-admin user as you\'re the last admin now.');
            $data['role'] = 'admin';
        }
        $user->update($data);
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        session()->flash('success', 'New information was saved successfully!');
        // if (auth()->user()->isAdmin() && !auth()->user()->is($user)) {
        //     return redirect()->route('allUsers');
        // }
        if (session()->has('appointment')) {
            $appointment = Appointment::find(session()->remove('appointment'));
            $user->appointments()->attach($appointment);
            return redirect()->route('users.courses.wait', ['user' => $user, 'appointment' => $appointment]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        if (!Hash::check($request->password, auth()->user()->password)) {
            session()->flash('error', 'The password is incorrect.');
            return back();
        }

        $user->delete();
        if ($user->is(auth()->user())) { //User quited
            session()->flash('warning', 'We are sad to see you going .. your account was deleted successfully.');
            return redirect()->route('main');
        } else { //Admin
            session()->flash('success', 'Account was deleted successfully.');
            return redirect()->route('admin.all-users');
        }
    }
}
