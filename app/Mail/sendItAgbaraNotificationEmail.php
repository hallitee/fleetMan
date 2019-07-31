<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\req;


class sendItAgbaraNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 public $req, $email, $copi, $loc;
    public function __construct($a, $b, $c/*, $d*/)
    {
        //
		$this->req = $a;
		$this->email =$b;
		$this->copi = $c;
		//$this->loc = $d;
		
		
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
		$subject = 'Agbara Trip Notification';
        return $this->view('email.agbaraITNotify')
					->from($address, $name)
					->subject($subject)
					->with(['form'=>$this->req,'email'=>$this->email/*, 'loc'=>$this->loc*/]);
    }
}
