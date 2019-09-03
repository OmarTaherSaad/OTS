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
Route::get('/lang/{locale}','MainController@langChange')->name('languageChange');


Route::get('/', 'MainController@index')->name('home');
Route::get('/about-me', 'MainController@about')->name('aboutMe');
Route::get('/contact', 'MainController@contactForm')->name('contact');
Route::get('/youtube', 'MainController@youtube')->name('youtube');
Route::get('/projects', 'MainController@projects')->name('projects');
Route::get('/media-and-interviews', 'MainController@media')->name('media');

//Contact
Route::get('/contact', 'MainController@contact')->name('contact');
Route::post('/contact', 'MainController@SubmitContact')->name('contact-submit');
