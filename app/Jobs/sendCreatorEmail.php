<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\creatorMail;
use App\req;
use App\Carmaster;
use App\Driver;

class sendCreatorEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
	 public $req, $car, $drv, $copi, $bcopi;
    public function __construct($a,$d, $e, $b, $c)
    {
        $this->req = $a;
		$this->copi = $b;
		$this->bcopi = $c;
		$this->car = $d;
		$this->drv = $e;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
		Mail::bcc($this->bcopi)->to($this->req->reqEmail)->send(new creatorMail($this->req,$this->car,$this->drv, $this->copi));
    }
}
