<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Guests;
use App\AddtGuest;
use App\FoodSelection;
use Illuminate\support\Facades\Mail;
use App\Mail\WeddingWebsiteMessage;
use App\Mail\Confirmation;
use App\Message;

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
        $declinedCount = 0;
	
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
			} elseif($guest->rsvp == "N") {
				$declinedCount++;
				
				if($guest->plusOne) {
					$declinedCount++;
				}
			}
		}

		return view('admin.guest_list', compact('guests', 'headCount', 'confirmedCount', 'declinedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$this->validate(request(), [
			'name' => 'required'
		]);
		
		$guest = new Guests();
        $guest->name = ucwords(strtolower(trim($request->name)));
		$guest->rsvp = isset($request->rsvp) ? 'Y' : null;
		$guest->email = $request->email;
		
		if($guest->save()) {
			// If user entered a plus one for the invitation
			if(isset($request->plus_one)) {
				$guest->plusOne()->create([
					'rsvp' => $guest->rsvp, 
					'name' => $request->plus_one,
					'added_by' => 'admin'
				]);
			}
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
		// dd($request);
		$first = ucfirst(strtolower(request('first', 'required')));
		$last = ucfirst(strtolower(request('last', 'required')));
		$name = trim($first . " " .$last);
		$inviteResponse = $request->rsvp == 'Going' ? 'Y' : 'N';
		$email = $request->email != '' ? $request->email : null;
		
		$foundGuest = Guests::where('name', $name)->get();
		$foundAddtGuest = AddtGuest::where('name', $name)->get();

		if($foundGuest->isNotEmpty()) {
			$foundGuest = $foundGuest->first();
			if($foundGuest->responded == "Y") {
				$inviteResponse = "Already responded";
			} else {
				$foundGuest->update([
					'rsvp' => $inviteResponse, 
					'responded' => 'Y',
					'email' => $email
				]);
			}
			
			return view('confirmed', compact('foundGuest', 'first', 'inviteResponse'));
		} elseif($foundAddtGuest->isNotEmpty()) {
			$foundAddtGuest = $foundAddtGuest->first();
			$guest = $foundAddtGuest->guests;

			if($guest->responded == "Y") {
				$inviteResponse = "Already responded";
			} else {
				$foundAddtGuest->update([
					'rsvp' => $inviteResponse,
					'email' => $email
				]);
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
        return view('admin.guest_list_edit', compact('guest'));
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
		$guest->responded = null;
		$guest->rsvp = null;
		$guest->email = $request->email;
		
		if($request->name == null) {
			$guest->delete();
			
			return redirect()->action('GuestController@index', $guest)->with('status', 'Invitation Successfully Removed');
		}
		
		if(isset($request->rsvpYes)) {
			$guest->rsvp = "Y";
			$guest->responded = 'Y';
		} elseif(isset($request->rsvpNo)) {
			$guest->rsvp = "N";
			$guest->responded = 'Y';
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
					'name' => $plusOneOption,
					'added_by' => 'admin'
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
    public function food_selection(Request $request, Guests $guests)
    {
		if(isset($request->add_guest_option)) {
			$food_selection = new FoodSelection();
			$food_selection->guests_id = $guests->id;
			$food_selection->food_option = $request->food_option;
			$food_selection->add_guest_id = $guests->plusOne->id;
			$food_selection->add_guest_option = $request->add_guest_option;
			
			if($food_selection->save()) {
				$guests->food_selected = 'Y';
				$guests->responded = 'Y';
				
				if($guests->save()) {
					if($guests->email != null) {
						\Mail::to($guests->email)->bcc('adc0426@gmail.com')->send(new Confirmation($guests));
					} else {
						\Mail::to('adc0426@gmail.com')->cc('jackson.tramaine3@gmail.com')->send(new Confirmation($guests));
					}
				}
			}
		} else {
			$food_selection = new FoodSelection();
			$food_selection->guests_id = $guests->id;
			$food_selection->food_option = $request->food_option;
			
			if($food_selection->save()) {
				$guests->food_selected = 'Y';
				$guests->responded = 'Y';
				
				if($guests->save()) {
					if($guests->email != null) {
						\Mail::to($guests->email)->bcc('adc0426@gmail.com')->send(new Confirmation($guests));
					} else {
						\Mail::to('adc0426@gmail.com')->cc('jackson.tramaine3@gmail.com')->send(new Confirmation($guests));
					}
				}
			}
		}

		return redirect('/')->with('status', 'Looks like your all set. Thanks for confirming your RSVP and making your food selection. Can\'t wait to see you on the big day.');
	}
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_food_selection(Request $request, Guests $guests)
    {
		$guests = Guests::orderBy('name', 'asc')->get();
		$seafood = FoodSelection::where('food_option', 'seafood')
			->orWhere('add_guest_option', 'seafood')
			->get();
		$chicken = FoodSelection::where('food_option', 'chicken')
			->orWhere('add_guest_option', 'chicken')
			->get();
		$beef = FoodSelection::where('food_option', 'beef')
			->orWhere('add_guest_option', 'beef')
			->get();
		
		return view('admin.food_selection', compact('guests', 'seafood', 'chicken', 'beef'));
	}
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_food_selection(Request $request, FoodSelection $foodSelection)
    {
		$guest = $foodSelection->guests;
		
		return view('admin.food_selection_edit', compact('guest', 'foodSelection'));
	}
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create_food_selection(Request $request, Guests $guests)
    {
		// dd($request);
		if($guests->food_option) {
			$guests->food_option->food_option = $request->food_option;
			
			if($guests->plusOne) {
				$guests->food_option->add_guest_option = $request->add_guest_option;
			}
			
			if($guests->food_option->save()) {
				$guest = $guests;
				$foodSelection = $guests->food_option;
				
				return redirect()->action('GuestController@edit_food_selection', compact('guest', 'foodSelection'))->with('status', 'Food Selections Updated');
			}
		} else {
			$guests->rsvp = 'Y';
			$guests->food_selected = 'Y';
			$guests->responded = 'Y';

			if($guests->save()) {
				$food_selection = new FoodSelection();
				$food_selection->guests_id = $guests->id;
				$food_selection->food_option = $request->food_option;
				
				if($guests->plusOne) {
					$food_selection->add_guest_id = $guests->plusOne->id;
					$food_selection->add_guest_option = $request->add_guest_option;
				}
				
				if($food_selection->save()) {
					$guest = $guests;
					$foodSelection = $food_selection;
					
					return redirect()->action('GuestController@edit_food_selection', compact('guest', 'foodSelection'))->with('status', 'Food Selections Updated');
				}
			}

		}
	}
	
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm_guest(Request $request)
    {
		$first = ucfirst(strtolower(request('first', 'required')));
		$last = ucfirst(strtolower(request('last', 'required')));
		$name = trim($first . " " .$last);
		$email = $request->email != '' ? $request->email : null;
		
		$foundGuest = Guests::where('name', $name)->get();
		$foundAddtGuest = AddtGuest::where('name', $name)->get();

		if($foundGuest->isNotEmpty()) {
			$foundGuest = $foundGuest->first();
			if($foundGuest->rsvp == 'Y') {
				if($foundGuest->food_selected == 'Y') {
					return view('already_confirmed', compact('first', 'last', 'email', 'name', 'foundGuest', 'foundAddtGuest'));
				} else {
					$guests = $foundGuest;
					return view('food_selection', compact('guests'));
				}
			} elseif($foundGuest->rsvp == 'N') {
				return view('changed_rsvp', compact('foundGuest'));
			} else {
				return view('confirmed', compact('first', 'last', 'email', 'name', 'foundGuest', 'foundAddtGuest'));
			}
		} elseif($foundAddtGuest->isNotEmpty()) {
			// Get the guest on the invitation
			$foundGuest = $foundAddtGuest->first()->guests;
			$foundAddtGuest = $foundAddtGuest->first();
			
			if($foundAddtGuest->guests->rsvp == 'Y') {
				if($foundAddtGuest->guests->food_selected == 'Y') {
					return view('already_confirmed', compact('first', 'last', 'email', 'name', 'foundGuest', 'foundAddtGuest'));
				} else {
					$guests = $foundGuest;
					return view('food_selection', compact('guests'));
				}
			} elseif($foundAddtGuest->guests->rsvp == 'N') {
				return view('changed_rsvp', compact('foundGuest', 'foundAddtGuest'));
			} else {
				return view('confirmed', compact('first', 'last', 'email', 'name', 'foundGuest', 'foundAddtGuest'));
			}
		} else {
			return view('no_invite', compact('first', 'last', 'email', 'name'));
		}
    }
	
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm_rsvp(Request $request, Guests $guests)
    {
		$inviteResponse = request('rsvp') == 'Going' ? 'Y' : 'N';
		$email = $request->email;

		if($guests->rsvp != null) {
			$inviteResponse = "Already responded";
		} else {
			$guests->update([
				'rsvp' => $inviteResponse,
				'email' => $email
			]);

			return view('food_selection', compact('guests'));
		}		
    }
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decline_rsvp(Request $request, Guests $guests)
    {
		$inviteResponse = request('rsvp') == 'Decline' ? 'N' : null;
		$email = $request->email;

		if($guests->rsvp != null) {
			$inviteResponse = "Already responded";
		} else {
			$guests->update([
				'rsvp' => $inviteResponse,
				'responded' => 'Y',
				'email' => $email
			]);

			return view('declined', compact('guests'));
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
