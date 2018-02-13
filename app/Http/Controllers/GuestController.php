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
		$headCount = 0;
        $confirmedCount = 0;
	
		foreach($guests as $guest) {
			$headCount++;
			if($guest->plusOne) {
				$headCount++;
			}
			
			if($guest->rsvp == "Y") {
				$confirmedCount++;
				
				if($guest->plusOne) {
					$confirmedCount++;
				}
			}
		}

		return view('guest_list', compact('guests', 'headCount', 'confirmedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$guest = new Guests();
        $guest->name = ucwords(strtolower(trim(request('name', 'required'))));
		$guest->rsvp = isset($request->rsvp) ? 'Y' : 'N';
		$guest->save();
		
		// dd($guest);
		
		if(isset($request->plus_one)) {
			$guest->plusOne()->create([
				'rsvp' => $guest->rsvp, 
				'name' => $request->plus_one
			]);
		}
		return redirect()->action('GuestController@index')->with('status', 'You have successfully added a new invite');
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
			
			return view('confirmed', compact('foundGuest', 'first', 'inviteResponse'));
		} elseif($foundAddtGuest->isNotEmpty()) {
			$foundAddtGuest = $foundAddtGuest->first();
			$guest = $foundAddtGuest->guests;

			if($guest->responded == "Y") {
				$inviteResponse = "Already responded";
			} else {
				$foundAddtGuest->update(['rsvp' => $inviteResponse]);
			}
			
			return view('additional_guest', compact('foundAddtGuest', 'guest', 'first', 'inviteResponse'));
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
    public function edit(Guests $guest)
    {
		// dd($guest);
        return view('guest_list_edit', compact('guest'));
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
		$guest = Guests::find($id);
		// dd($guest);
		$newName = $request->addt_guest;
		$plusOneOption = $request->plusOne;
		
		if($plusOneOption == "No Plus One") {
			$returnResponse = 'Thanks for your response. Your RSVP has be confirmed';
			
			if($guest->plusOne)	{
				$guest->plusOne()->delete();
			}

			return redirect('/food_selection/' . $guest->id )->with('status', $returnResponse);
		} elseif($plusOneOption == "Check Back Soon") {
			$guest->update(['rsvp' => 'N', 'responded' => 'N']);
			
			$returnResponse = 'Ok let us know as soon as possible. We hope you can make it but understand if you can\'t. Hope to hear from you soon.';

			return redirect('/')->with('status', $returnResponse);
		} elseif(isset($request->plusOneName)) {
			$newName = $request->plusOneName;
			
			$returnResponse = 'Thanks for your response. We will try and add your plus one. We will reach out to you once we get a change to look at our guest list';
			$guest->plusOne()->create(['name' => $newName, 'rsvp' => 'Y']);

			return redirect('/food_selection/' . $guest->id )->with('status', $returnResponse);
		} else {
			$guest->plusOne->update(['rsvp' => 'Y']);
			
			$returnResponse = 'Thanks for your response. Both, you and your RSVP\'s have been confirmed, we cant wait to see you there.';

			return redirect('/food_selection/' . $guest->id )->with('status', $returnResponse);
		}
		
    }

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, Guests $guest)
    {
		// dd($request);
		$guest->name = $request->name;
		$plusOneOption = $request->plus_one;
		$guest->rsvp = "";
		
		if($request->name == null) {
			$guest->delete();
			
			return redirect()->action('GuestController@index', $guest)->with('status', 'Invitation Successfully Removed');
		}
		
		if(isset($request->rsvp)) {
			$guest->rsvp = "Y";
		} else {
			$guest->rsvp = "N";
		}

		if($plusOneOption == "") {
			if($guest->plusOne) { $guest->plusOne()->delete();	}
		} else {
			if($guest->plusOne) { 
				$guest->plusOne->update([
					'rsvp' => $guest->rsvp, 
					'name' => $plusOneOption
				]); 
			} else {
				$guest->plusOne()->create([
					'rsvp' => $guest->rsvp, 
					'name' => $plusOneOption
				]); 				
			}
		}
		
		$guest->save();
		
		return redirect()->action('GuestController@edit', $guest)->with('status', 'You have updated this invitation successfully');
    }
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function food_selection(Request $request, Guests $guest)
    {
		
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
