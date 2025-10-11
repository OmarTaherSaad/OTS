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

Route::get('lang/{locale}', [App\Http\Controllers\MainController::class, 'langChange'])->name('languageChange');


Route::get('', [App\Http\Controllers\MainController::class, 'index'])->name('index');

//Legal Pages
Route::get('privacy-policy', [App\Http\Controllers\MainController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms-and-conditions', [App\Http\Controllers\MainController::class, 'termsAndConditions'])->name('terms-and-conditions');

//Freelancing
Route::prefix('freelancing')->name('freelancing')->group(function () {
    Route::get('payment-methods', [App\Http\Controllers\FreelancingController::class, 'payment_methods'])->name('payment-methods');
});

Route::get('media-and-interviews', [App\Http\Controllers\MainController::class, 'media'])->name('media');

//Contact
Route::post('contact', [App\Http\Controllers\MainController::class, 'SubmitContact'])
    ->middleware('throttle:5,1')
    ->name('contact-submit');

Auth::routes();
Route::get('login/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login-providers');
Route::get('login/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('login-providers-callback');

Route::prefix('physics-classes/')->name('physics.')->group(function () {
    Route::get('register', [App\Http\Controllers\PhysicsSlotController::class, 'register'])->name('register');
    Route::post('store', [App\Http\Controllers\PhysicsSlotController::class, 'store'])->name('store');
});
Route::post('physics-classes/get-chapters', [App\Http\Controllers\PhysicsSlotController::class, 'getChapters'])->name('get-chapters');


Route::name('users.')->group(function () {
    Route::get('home', [App\Http\Controllers\UsersController::class, 'home'])->name('home');
    Route::prefix('users/{user}/')->group(function () {
        Route::get('courses', [App\Http\Controllers\UsersController::class, 'courses'])->name('courses');
        Route::get('courses/{appointment}/wait', [App\Http\Controllers\UsersController::class, 'courses_wait'])->name('courses.wait');
        Route::get('edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('edit');
        Route::patch('edit', [App\Http\Controllers\UsersController::class, 'update']);
        Route::delete('delete', [App\Http\Controllers\UsersController::class, 'destroy'])->name('delete-user');
    });
});

Route::prefix('admin')->middleware('role:admin')->name('admin.')->group(function () {
    Route::get('users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('entrance', [App\Http\Controllers\AdminController::class, 'entrance'])->name('entrance');
    Route::get('finalize-payments', [App\Http\Controllers\AdminController::class, 'finalize_payments'])->name('finalize-payments');
    Route::post('finalize-payments/{appointment_user}', [App\Http\Controllers\AdminController::class, 'finalize_payments_action'])->name('finalize-payments-action');
});

Route::prefix('courses')->name('course.')->group(function () {
    Route::get('appointments/{course}', [App\Http\Controllers\CourseController::class, 'appointments_view'])->name('appointments');
    Route::get('enroll/{appointment}', [App\Http\Controllers\AppointmentController::class, 'enroll'])->middleware('auth')->name('enroll');
});;
Route::resource('course', App\Http\Controllers\CourseController::class);
Route::resource('appointment', App\Http\Controllers\AppointmentController::class)->except(['show']);
//Entrance Card
Route::get('appointment-entrance-card/{AppointUser}', [App\Http\Controllers\AppointmentController::class, 'entrance_card'])->name('entrance-card');

//Helpdesk
Route::prefix('helpdesk')->middleware('role:training_academy_helpdesk')->name('helpdesk.')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HelpdeskController::class, 'dashboard'])->name('dashboard');
    Route::get('appointment-entrance-scan', [App\Http\Controllers\HelpdeskController::class, 'entrance_card_scanner'])->name('entrance-card-scanner');
    Route::post('appointment-entrance-scan/{appointmentUser}', [App\Http\Controllers\HelpdeskController::class, 'entrance_card_scanned'])->name('entrance-card-scanned');
    Route::post('appointment-entrance-scan/{appointmentUser}/enter', [App\Http\Controllers\HelpdeskController::class, 'entrance_card_enter'])->name('entrance-card-enter');
});
