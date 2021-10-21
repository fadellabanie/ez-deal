<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\AdvertisementEmail;
use App\Http\Traits\Notification;
use App\Models\PaymentReport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SubscribeInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Notification;

    public $user;
    public $title;
    public $body;

    public function __construct($user,$title, $body)
    {
        $this->user = $user;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->send($this->user, $this->title, $this->body);

        $report = PaymentReport::where('user_id',$this->user->id)->latest ()->first();

        Mail::to($this->user->email)->send(new AdvertisementEmail($report));

    }
}
