<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Set Locale */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('lang/{locale}', 'MainController@langChange')->name('languageChange');


Route::get('', 'MainController@index')->name('index');

//Legal Pages
Route::get('privacy-policy', 'MainController@privacyPolicy')->name('privacy-policy');
Route::get('terms-and-conditions', 'MainController@termsAndConditions')->name('terms-and-conditions');

//Freelancing
Route::prefix('freelancing')->name('freelancing')->group(function () {
    Route::get('payment-methods', 'FreelancingController@payment_methods')->name('payment-methods');
});

Route::get('media-and-interviews', 'MainController@media')->name('media');

//Contact
Route::post('contact', 'MainController@SubmitContact')->name('contact-submit');

Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login-providers');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login-providers-callback');

Route::prefix('physics-classes/')->name('physics.')->group(function () {
    Route::get('register', 'PhysicsSlotController@register')->name('register');
    Route::post('store', 'PhysicsSlotController@store')->name('store');
});
Route::post('physics-classes/get-chapters', 'PhysicsSlotController@getChapters')->name('get-chapters');


Route::name('users.')->group(function () {
    Route::get('home', 'UsersController@home')->name('home');
    Route::prefix('users/{user}/')->group(function () {
        Route::get('courses', 'UsersController@courses')->name('courses');
        Route::get('courses/{appointment}/wait', 'UsersController@courses_wait')->name('courses.wait');
        Route::get('edit', 'UsersController@edit')->name('edit');
        Route::patch('edit', 'UsersController@update');
        Route::delete('delete', 'UsersController@destroy')->name('delete-user');
    });
});

Route::prefix('admin')->middleware('role:admin')->name('admin.')->group(function () {
    Route::get('users', 'AdminController@users')->name('users');
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('entrance', 'AdminController@entrance')->name('entrance');
    Route::get('finalize-payments', 'AdminController@finalize_payments')->name('finalize-payments');
    Route::post('finalize-payments/{appointment_user}', 'AdminController@finalize_payments_action')->name('finalize-payments-action');
});

Route::prefix('courses')->name('course.')->group(function () {
    Route::get('appointments/{course}', 'CourseController@appointments_view')->name('appointments');
    Route::get('enroll/{appointment}', 'AppointmentController@enroll')->middleware('auth')->name('enroll');
});;
Route::resource('course', 'CourseController');
Route::resource('appointment', 'AppointmentController')->except(['show']);
//Entrance Card
Route::get('appointment-entrance-card/{AppointUser}', 'AppointmentController@entrance_card')->name('entrance-card');

//Helpdesk
Route::prefix('helpdesk')->middleware('role:training_academy_helpdesk')->name('helpdesk.')->group(function () {
    Route::get('dashboard', 'HelpdeskController@dashboard')->name('dashboard');
    Route::get('appointment-entrance-scan', 'HelpdeskController@entrance_card_scanner')->name('entrance-card-scanner');
    Route::post('appointment-entrance-scan/{appointmentUser}', 'HelpdeskController@entrance_card_scanned')->name('entrance-card-scanned');
    Route::post('appointment-entrance-scan/{appointmentUser}/enter', 'HelpdeskController@entrance_card_enter')->name('entrance-card-enter');
});
