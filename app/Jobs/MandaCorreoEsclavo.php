<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\Correito;
use Illuminate\Support\Facades\Mail;

class MandaCorreoEsclavo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $from;
    private $to;
    private $subject;
    private $body;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($from, $subject, $to, $body)
    {
        $this -> from = $from;
        $this -> to = $to;
        $this -> body = $body;
        $this -> subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $correo = new Correito($this -> from, $this -> subject, $this -> $body);
        Mail::to($this -> to)->send($correo);
    }
}
