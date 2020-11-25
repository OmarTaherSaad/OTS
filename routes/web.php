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
Route::get('lang/{locale}', 'MainController@langChange')->name('languageChange');


Route::get('', 'MainController@index')->name('home');
Route::get('about-me', 'MainController@about')->name('aboutMe');
Route::get('contact', 'MainController@contactForm')->name('contact');
Route::get('youtube', 'MainController@youtube')->name('youtube');
Route::get('projects', 'MainController@projects')->name('projects');
Route::get('course-registration', 'MainController@course_registration')->name('course-registration');
Route::get('media-and-interviews', 'MainController@media')->name('media');

//Contact
Route::get('contact', 'MainController@contact')->name('contact');
Route::post('contact', 'MainController@SubmitContact')->name('contact-submit');

//Auth::routes();
Auth::routes(['register' => false]);

Route::prefix('physics-classes/')->name('physics.')->group(function () {
    Route::get('register', 'PhysicsSlotController@register')->name('register');
    Route::post('store', 'PhysicsSlotController@store')->name('store');
});
//Route::resource('7', 'PhysicsSlotController')->names('physics');
Route::post('physics-classes/get-chapters', 'PhysicsSlotController@getChapters')->name('get-chapters');
