<?php

namespace App\Jobs;

use App\Http\Traits\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Models\RealEstate;
use Log;

class NotifyUnActiveRealEstate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Notification;

    public $title;
    public $body;

    public function __construct($title, $body)
    {
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
        $users = RealEstate::with('user')->active()
            ->pluck('user_id');

        $this->sendNotificationToAllUser($users, $this->title, $this->body);
    }
}
