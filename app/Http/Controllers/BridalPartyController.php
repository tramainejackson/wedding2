<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BridalParty;
use Intervention\Image\ImageManager;

class BridalPartyController extends Controller
{
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
}
