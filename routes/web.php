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

use App\Message;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/registry', function() {
	return view('registry');
})->name('registry');

Route::get('/donations/paypal', function() {
	return view('donations.paypal');
})->name('paypal');

Route::get('/accommodations', function() {
	return view('accommodations');
})->name('accommodations');

Route::get('/guest_list/create', function() {
	return view('admin.create_guest');
})->middleware('auth');

Route::get('/guest_list', 'GuestController@index')->middleware('auth');

Route::get('/guest_list_food', 'GuestController@admin_food_selection')->middleware('auth');

Route::get('/food_selection/{foodSelection}/edit', 'GuestController@edit_food_selection')->middleware('auth');

Route::get('/guest_list/{guest}/edit', 'GuestController@edit')->middleware('auth');

Route::post('/guest_list/create', 'GuestController@create');

Route::patch('/guest_list/{guest}/edit', 'GuestController@update2')->middleware('auth');

Route::get('/party', 'BridalPartyController@index');

Route::get('/food_selection/{guests}', function(\App\Guests $guests) {
	return view('food_selection', compact('guests'));
})->name('food_selection');

Route::post('/food_selection/{guests}', 'GuestController@food_selection');

Route::get('/photos', 'PhotoController@index')->name('photos');

Route::patch('/confirmed', 'GuestController@store');

Route::get('/confirmed', 'GuestController@confirm_guest');

Route::patch('/confirmed/{guests}', 'GuestController@confirm_rsvp');

Route::patch('/additional_guest/{guests}', 'AddtGuestController@store');

Route::post('/new_message', 'MessageController@store');

Route::get('/home', 'HomeController@index')->name('home');