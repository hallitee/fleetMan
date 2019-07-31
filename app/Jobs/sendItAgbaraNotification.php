<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendItAgbaraNotificationEmail;

class sendItAgbaraNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
	//	$this->loc = $d;
		
		
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
		
		Mail::to($this->email)->cc($this->copi)->send(new sendItAgbaraNotificationEmail($this->req, $this->email, $this->copi /*, $this->loc*/));
		
		
    }
}
