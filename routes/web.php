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

Route::get('/party', 'BridalPartyController@index');

Route::get('/guest_list', 'GuestController@index');

Route::get('/photos', function() {
	return view('photos');
})->name('photos');

Route::get('/registry', function() {
	return view('registry');
})->name('registry');

Route::patch('/confirmed', 'GuestController@update');

Route::post('/confirmed/{id}', 'AddtGuestController@store');

Route::patch('/confirmed/{id}', 'AddtGuestController@update');

Route::post('/new_message', 'MessageController@store');


// Route::resource('/', 'GuestController');
