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
			$guest->addPlusOne($plusOneName, 'Y');
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
		$addtGuest = AddtGuest::findOrFail($id);
		$plusOneOption = $request->plusOne;
		$guest = $addtGuest->guests;
		
		if($plusOneOption == "Check Back Soon") {
			$addtGuest->update(['rsvp' => 'N']);
			$guest->update(['rsvp' => 'N', 'responded' => 'N']);
			$returnResponse = 'Ok let us know as soon as possible. We hope you can make it but understand if you can\'t. Hope to hear from you soon.';
		} else {
			$guest->update(['rsvp' => 'Y', 'responded' => 'Y']);
			$returnResponse = 'Thanks for your response. Both of yours RSVP\'s have been confirmed, we cant wait to see you there.';
		}
		return redirect('/')->with('status', $returnResponse);
    }
}
