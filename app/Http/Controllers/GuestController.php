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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guests $guests)
    {
        // return $guests;
		// return view('guest_list', compact('guests'));
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
    public function update(Request $request)
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
			
			return view('confirmed', compact(['foundGuest', 'foundAddtGuest', 'first', 'inviteResponse']));
		} elseif($foundAddtGuest->isNotEmpty()) {
			$foundAddtGuest = $foundAddtGuest->first();
			$foundAddtGuest->update(['rsvp' => $inviteResponse]);
			
			return view('additional_guest', compact(['foundAddtGuest', 'foundGuest', 'first', 'inviteResponse']));
		} else {
			return view('no_invite', compact('name'));
		}
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
