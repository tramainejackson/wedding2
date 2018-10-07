<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BridalParty;
use App\Setting;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

class BridalPartyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function create()
    {
        $bridalParty = BridalParty::groupBy('order')->having('id', '>', 0)->get()->count();

		return view('admin.edit_bridal_party', compact('bridalParty'));
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);

        $orderNum = $request->order_num;
        $title = $request->title;
        $name = $request->name;
        $blurb = $request->blurb;

        foreach($orderNum as $key => $value) {

            $couple = BridalParty::getBridalOrder($value);

            // Couple member #1
            $couple[0]->name = $name[$key * 2];
            $couple[0]->title = $title[$key * 2];
            $couple[0]->blurb = $blurb[$key * 2];

            // Couple member #2
            $couple[1]->name = $name[($key * 2) +1];
            $couple[1]->title = $title[($key * 2) +1];
            $couple[1]->blurb = $blurb[($key * 2) +1];

            if($couple[0]->save()) {

             if($couple[1]->save()) {

                }

            }

        }

		return redirect()->back()->with('status', 'Bridal Party and Stories Updated');
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
//		return view('party', compact('bridalParty'));
    }

}
