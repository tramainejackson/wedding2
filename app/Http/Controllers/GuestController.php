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
		// dd($request);
		$this->validate(request(), [
			'name' => 'required'
		]);
		
		$guest = new Guests();
        $guest->name = ucwords(strtolower(trim($request->name)));
		$guest->email = $request->email;
		
		if($guest->save()) {
			// If user entered a plus one for the invitation
			if($request->plus_one != null) {
				$guest->plusOne()->create([
					'name' => $request->plus_one,
					'added_by' => 'admin'
				]);
			}

			return redirect()->action('GuestController@edit', $guest)->with('status', 'You have successfully added a new invite');
		}
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
		$guest->email = $request->email;
		$plusOneOption = $request->plus_one;
		
		if(isset($request->rsvpYes)) {
			$guest->rsvp = "Y";
			$guest->responded = 'Y';
		} elseif(isset($request->rsvpNo)) {
			$guest->rsvp = "N";
			$guest->responded = 'Y';
		}

		// If the RSVP was declined, then remove any food selections
		// and make food selected null
		if($guest->rsvp == "N") {
			$guest->food_selected = null;
			
			if($guest->food_option) {
				$guest->food_option->delete();
			}
		} elseif($guest->rsvp == "Y") {
			// If there is not a food option then make add one
			if(!$guest->food_option) {
				$foodSelection = new FoodSelection();
				$foodSelection->food_option = 'blank';
				$foodSelection->guests_id = $guest->id;
				$foodSelection->save();
			}

			if($guest->plusOne) { 
				if($plusOneOption == "") {
					// If there is a plus one in the db for the 
					// guest and that addt_guest guest was removed, 
					// then delete the plus one
					if($guest->plusOne()->delete()) {
						if($guest->food_option) {
							$guest->food_option->add_guest_id = null;
							$guest->food_option->add_guest_option = null;
							$guest->food_option->save();
						}
					}
				} else {
					$guest->plusOne->update([
						'rsvp' => $guest->rsvp, 
						'name' => $plusOneOption
					]);
					
					if($guest->food_option) {
						$guest->food_option->add_guest_id = $guest->plusOne->id;
						$guest->food_option->add_guest_option = 'blank';
						$guest->food_option->save();
					}
				}
			} else {
				if($plusOneOption != "") {
					$plusOneOption = $guest->plusOne()->create([
						'rsvp' => $guest->rsvp, 
						'name' => $plusOneOption,
						'added_by' => 'admin'
					]);

					if($guest->food_option) {
						$guest->food_option->add_guest_option = 'blank';
						$guest->food_option->add_guest_id = $plusOneOption->id;
						$guest->food_option->save();
					}
				}
			}
		} else {
			if($plusOneOption == "") {
				// If there is a plus one in the db for the 
				// guest and that addt_guest guest was removed, 
				// then delete the plus one
				if($guest->plusOne()->delete()) {
					if($guest->food_option) {
						$guest->food_option->add_guest_id = null;
						$guest->food_option->add_guest_option = null;
						$guest->food_option->save();
					}
				}
			} else {
				$plusOneOption = $guest->plusOne()->create([
					'rsvp' => isset($guest->rsvp) ? $guest->rsvp : null, 
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
		if($guests->food_option) {
			return redirect('/')->with('status', 'Looks like you have a food selection already. If you don\'t believe you made a selection already. Please contact us and we will double check for you');
		} else {
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
		$guestSeafood = FoodSelection::where('food_option', 'seafood')->get();
		$guestBeef = FoodSelection::where('food_option', 'beef')->get();
		$guestChicken = FoodSelection::where('food_option', 'chicken')->get();
		$addGuestSeafood = FoodSelection::where('add_guest_option', 'seafood')->get();
		$addGuestChicken = FoodSelection::where('add_guest_option', 'chicken')->get();
		$addGuestBeef = FoodSelection::where('add_guest_option', 'beef')->get();
		$noSelection2 = FoodSelection::Where('food_option', 'blank')->get();
		$noSelection1 = FoodSelection::where('add_guest_option', 'blank')->get();
		
		return view('admin.food_selection', compact('guests', 'guestBeef', 'guestChicken', 'guestSeafood', 'addGuestBeef', 'addGuestChicken', 'addGuestSeafood', 'noSelection1', 'noSelection2'));
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
			if($request->food_option == 'blank') {
				$guests->food_selected = null;
				$guests->responded = null;
				$guests->save();
				
				if($guests->plusOne) {
					$guests->food_option->food_option = $request->food_option;
					$guests->food_option->add_guest_option = $request->add_guest_option;
				} else {
					if($guests->food_option->delete()) {
						return redirect()->action('GuestController@admin_food_selection')->with('status', 'Food Selections Updated');
					}
				}
			} else {
				$guests->food_option->food_option = $request->food_option;
				
				// Update plus one food option
				if($guests->plusOne) {
					$guests->food_option->add_guest_option = $request->add_guest_option;
				}
			}
			
			if($guests->food_option->save()) {
				return redirect()->back()->with('status', 'Food Selections Updated');
			}
		} else {
			$food_selection = new FoodSelection();
			$guests->rsvp = 'Y';
			$guests->responded = 'Y';
			$guests->food_selected = 'Y';

			if($guests->save()) {
				$food_selection->guests_id = $guests->id;
				$food_selection->food_option = $request->food_option;
				
				if($guests->plusOne) {
					$food_selection->add_guest_id = $guests->plusOne->id;
					$food_selection->add_guest_option = $request->add_guest_option;
				}
				
				if($food_selection->save()) {
					$guest = $guests;
					$foodSelection = $food_selection;
					
				}
			}

			return redirect()->back()->with('status', 'Food Selections Updated');
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
    public function destroy(Request $request, Guests $guests)
    {
        // dd($guests);
		if($guests->delete()) {
			// If there is a addt guest then remove guest
			if($guests->plusOne) {
				$guests->plusOne->delete();
			}
			
			// If there is a food option for the guest then remove 
			// food option
			if($guests->food_option) {
				$guests->food_option->delete();
			}
			
			return redirect()->action('GuestController@index', $guests)->with('status', 'Invitation Successfully Removed');
		}
    }
}
