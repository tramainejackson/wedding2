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

// Route::get('/test', function () {
    // return view('test');
// })->name('test');

Route::get('/new_bridal_couple_row', function() {
	return view('new_bridal_couple_row');
});

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registry', 'HomeController@registry')->name('registry');

Route::get('/settings', 'HomeController@settings')->name('settings');

Route::get('/donations/paypal', 'HomeController@paypal')->name('paypal');

Route::get('/accommodations', 'HomeController@accommodations')->name('accommodations');

Route::get('/guest_list/create', function() {
	return view('admin.create_guest');
})->middleware('auth');

Route::get('/guest_list', 'GuestController@index')->middleware('auth')->name('guest.index');

Route::get('/guest_list_food', 'GuestController@admin_food_selection')->middleware('auth');

Route::get('/food_selection/{foodSelection}/edit', 'GuestController@edit_food_selection')->middleware('auth');

Route::get('/food_selection/{guests}/create', function(\App\Guests $guests) {
	$guest = $guests;
	$foodSelection = $guests->food_selection;

	return view('admin.food_selection_edit', compact('guest', 'foodSelection'));
})->middleware('auth');

Route::get('/food_selection/{guests}', function(\App\Guests $guests) {
	return view('food_selection', compact('guests'));
})->name('food_selection');

Route::patch('/food_selection/{guests}/create', 'GuestController@create_food_selection')->middleware('auth');

Route::get('/guest_list/{guest}/edit', 'GuestController@edit')->middleware('auth')->name('guest.edit');

Route::post('/guest_list/create', 'GuestController@create');

Route::patch('/guest_list/{guest}/edit', 'GuestController@update2')->middleware('auth');

Route::delete('/guest_list/{guests}', 'GuestController@destroy')->middleware('auth');

Route::post('/food_selection/{guests}', 'GuestController@food_selection');

Route::patch('/confirmed', 'GuestController@store');

Route::get('/confirmed', 'GuestController@confirm_guest');

Route::patch('/confirmed/{guests}', 'GuestController@confirm_rsvp');

Route::patch('/declined/{guests}', 'GuestController@decline_rsvp');

Route::patch('/additional_guest/{guests}', 'AddtGuestController@store');

Route::post('/new_message', 'MessageController@store');

Route::patch('/update_settings', 'HomeController@update_settings');

Route::post('/photos/remove_photos', 'PhotoController@remove_photos');

Route::resource('/photos', 'PhotoController');

Route::resource('/bridal_party', 'BridalPartyController');

Route::delete('/remove_couple', 'BridalPartyController@remove_couple')->middleware('auth');