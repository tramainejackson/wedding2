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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/registry', function() {
	return view('registry');
})->name('registry');

Route::get('/party', 'BridalPartyController@index');

Route::get('/guest_list', 'GuestController@index')->middleware('auth');

Route::get('/photos', 'PhotoController@index')->name('photos');

Route::patch('/confirmed', 'GuestController@update');

Route::post('/confirmed/{id}', 'AddtGuestController@store');

Route::patch('/confirmed/{id}', 'AddtGuestController@update');

Route::post('/new_message', 'MessageController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
