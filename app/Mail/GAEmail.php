<?php

namespace App\Mail;
use App\User;
use App\req;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GAEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 public $req, $email, $copi, $bcopi;
    public function __construct(req $a, $b, $c,$d)
    {
        //
		$this->req = $a;
		$this->email = $b;
		$this->copi = $c;
		$this->bcopi = $d;
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
		$subject = 'Approved Car Reservation Request';
        return $this->view('email.gaemail')
		->cc($this->copi)
					->from($address, $name)
					->subject($subject)->with(['form'=>$this->req,'email'=>$this->email, 'copy'=>$this->copi, 'bcopy'=>$this->bcopi]);
    }
}
