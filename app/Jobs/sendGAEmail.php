<?php

namespace App\Jobs;
use App\User;
use App\req;
use App\Mail\GAEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class sendGAEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
		Mail::bcc($this->bcopi)->to($this->email)->send(new GAEmail($this->req, $this->email, $this->copi, $this->bcopi));
    }
}
