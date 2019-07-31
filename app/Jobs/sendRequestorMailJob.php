<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\requestorMail;
use Illuminate\Support\Facades\Mail;

class sendRequestorMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
		Mail::to($this->email)->send(new requestorMail($this->req, $this->email));
    }
}
