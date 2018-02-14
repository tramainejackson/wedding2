<?php

namespace App\Mail;

use App\Guests;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Confirmation extends Mailable
{
    use Queueable, SerializesModels;

	/**
	* The message instance
	*
	* @var message
	*/
	public $guest;
	
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Guests $guests)
    {
        $this->guest = $guests;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('RSVP Confirmation')->view('emails.new_confirmation', compact('guest'));
    }
}
