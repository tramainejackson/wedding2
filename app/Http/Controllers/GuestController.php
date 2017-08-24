<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guests;
use App\AddtGuest;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guests::orderBy('name', 'asc')->get();
		$plusOnes = AddtGuest::all();
        $confirmedCount = 0;
	
		foreach($guests as $guest) {
			if($guest->rsvp == "Y") {
				$confirmedCount++;
				
				if($guest->plusOne) {
					$confirmedCount++;
				}
			}
		}

		return view('guest_list', compact('guests', 'plusOnes', 'confirmedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$first = ucfirst(strtolower(request('first', 'required')));
		$last = ucfirst(strtolower(request('last', 'required')));
		$name = trim($first . " " .$last);
		$inviteResponse = $request->rsvp == 'Going' ? 'Y' : 'N';
		
		$foundGuest = Guests::where('name', $name)->get();
		$foundAddtGuest = AddtGuest::where('name', $name)->get();

		if($foundGuest->isNotEmpty()) {
			$foundGuest = $foundGuest->first();
			if($foundGuest->responded == "Y") {
				$inviteResponse = "Already responded";
			} else {
				$foundGuest->update(['rsvp' => $inviteResponse, 'responded' => 'Y']);
			}
			
			return view('confirmed', compact(['foundGuest', 'first', 'inviteResponse']));
		} elseif($foundAddtGuest->isNotEmpty()) {
			$foundAddtGuest = $foundAddtGuest->first();
			$guest = $foundAddtGuest->guests;

			if($guest->responded == "Y") {
				$inviteResponse = "Already responded";
			} else {
				$foundAddtGuest->update(['rsvp' => $inviteResponse]);
			}
			
			return view('additional_guest', compact(['foundAddtGuest', 'guest', 'first', 'inviteResponse']));
		} else {
			return view('no_invite', compact('name'));
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guests $guests)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
			if($guest->plusOne);
			{
				$guest->plusOne()->delete();
			}
		} elseif($plusOneOption == "Check Back Soon") {
			$guest->update(['rsvp' => 'N', 'responded' => 'N']);
			$returnResponse = 'Ok let us know as soon as possible. We hope you can make it but understand if you can\'t. Hope to hear from you soon.';
		} elseif(isset($request->plusOneName)) {
			$newName = $request->plusOneName;
			$returnResponse = 'Thanks for your response. We will try and add your plus one. We will reach out to you once we get a change to look at our guest list';
			$guest->plusOne()->create(['name' => $newName, 'rsvp' => 'Y']);
		} else {
			$guest->plusOne->update(['rsvp' => 'Y']);
			$returnResponse = 'Thanks for your response. Both of yours RSVP\'s have been confirmed, we cant wait to see you there.';
		}
		// dd($guest);
		return redirect('/')->with('status', $returnResponse);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
