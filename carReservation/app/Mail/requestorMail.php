<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\req;

class requestorMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 public $req, $email;
    public function __construct($a, $b)
    {
        //
		$this->req = $a;
		$this->email = $b;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $address = 'helpdesk@esrnl.com';
		$name = 'Car Reservation';
		$subject = 'Your Car Reservation Request';
        return $this->view('email.requestormail')
					->from($address, $name)
					->subject($subject)
					->with(['form'=>$this->req,'email'=>$this->email]);
    }
}
