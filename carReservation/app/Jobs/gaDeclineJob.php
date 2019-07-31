<?php

namespace App\Jobs;
use App\User;
use App\req;
use App\Mail\gaDeclineMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;


class gaDeclineJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
	 public $req, $copi;
    public function __construct($a, $b)
    {
        //
		$this->req   =$a;
		$this->copi = $b;
		
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
		Mail::cc($this->copi)->to($this->email)->send(new gaDeclineEmail($this->req));
		
		
    }
}
