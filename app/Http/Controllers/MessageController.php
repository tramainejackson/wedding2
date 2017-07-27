<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\MessageReceived;
use App\Message;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate(request(), [
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);
		
		$userMessage = Message::create(
			request(['name', 'email', 'message'])
		);
		
		Mail::to($userMessage)->send(new MessageReceived($userMessage));
		
		return redirect('/')->with('status', 'Thanks for reaching out. We got your message and will get back to you once one of us checks our email.');
    }
}
