<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BridalParty;
use App\Setting;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'settings', 'update_settings', 'edit_party', 'update_party']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
    /**
     * Show the application edit settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
		$settings = Setting::first();
		
        return view('admin.edit_settings', compact('settings'));
    }	
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_settings(Request $request)
    {
        $this->validate(request(), [
			'hisname' => 'required',
			'hername' => 'required',
			'lastname' => 'required',
			'email' => 'nullable',
			'wedding_date' => 'required',
		]);

        $settings = Setting::first();
        $wedding_date = new Carbon($request->wedding_date_submit);

        $settings->his_name = $request->hisname;
		$settings->her_name = $request->hername;
		$settings->lastname = $request->lastname;
		$settings->email = $request->email;
		$settings->wedding_date = $wedding_date->toDateString();
		$settings->hashtag = $request->hashtag;
	
		if($settings->save()) {
			
			return redirect()->back()->with('Settings updated successfully');
			
		}
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function party()
    {
        $bridalParty = BridalParty::orderBy('order', 'asc')->get();
        // $img = \Image::make('images/anissa.jpg')->resize(450, 400)->save('images/anissa2.jpg');
        // $img = \Image::canvas(100, 100, '#ff0000');

		// echo $img;
		return view('party', compact('bridalParty'));
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_party()
    {
        $bridalParty = BridalParty::groupBy('order')->having('id', '>', 0)->get()->count();

		return view('admin.edit_bridal_party', compact('bridalParty'));
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_party(Request $request)
    {
        dd($request);
//		return view('party', compact('bridalParty'));
    }
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {	
		return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function registry()
    {
		return view('registry');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function accommodations()
    {
		return view('accommodations');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function paypal()
    {
		return view('donations.paypal');
    }
}
