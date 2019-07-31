<?php

namespace App\Mail;

use App\req;
use App\Carmaster;
use App\Driver;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class creatorMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 public $req,$car, $drv, $copi, $bcopi;
    public function __construct($a, $c, $d, $b)
    {
        //
		$this->req = $a;
		$this->copi = $b;
		$this->car = $c;
		$this->drv = $d;
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
		$subject = 'Car Request Allocated';
        return $this->view('email.allocated')
					->cc($this->copi)
					->from($address, $name)
					->subject($subject)->with(['form'=>$this->req,'car'=>$this->car,'drv'=>$this->drv]);
    }
}
