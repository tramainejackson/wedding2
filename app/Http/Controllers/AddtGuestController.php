<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guests;
use App\AddtGuest;

class AddtGuestController extends Controller
{
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Guests $guest, $id)
    {
		$guest = Guests::findOrFail($id);
		$plusOneOption = request('plusOne', 'required');
		$plusOneName = request('plusOneName', 'required');
		
		if($plusOneOption == "No Plus One") {
			$returnResponse = 'Thanks for your response. Your RSVP has be confirmed';
			$guest->rsvp = 'Y';
			$guest->responded = 'Y';
			$guest->save();
		} else {
			$guest->addPlusOne($plusOneName);
			$returnResponse = 'Thanks for your response. We will try and add your plus one. We will reach out to you once we get a change to look at our guest list';
		}
		
		return redirect('/')->with('status', $returnResponse);
		// dd($guest);
    }
	
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$guest = Guests::findOrFail($id);
		$newName = $request->addt_guest;
		$plusOneOption = $request->plusOne;
		
		if($plusOneOption == "No Plus One") {
			$returnResponse = 'Thanks for your response. Your RSVP has be confirmed';
			$guest->plusOne()->delete();
		} elseif($plusOneOption == "Check Back Soon") {
			$returnResponse = 'Ok let us know as soon as possible. We hope you can make it but understand if you can\'t. Hope to hear from you soon.';
		} elseif($request->addt_guest) {
			$returnResponse = 'Thanks for your response. We will try and add your plus one. We will reach out to you once we get a change to look at our guest list';
			$guest->plusOne()->update(['name' => $newName]);
		} else {
			$returnResponse = 'Thanks for your response. Both of yours RSVP\'s have been confirmed, we cant wait to see you there.';
		}
		// dd($guest);
		return redirect('/')->with('status', $returnResponse);
    }
}
