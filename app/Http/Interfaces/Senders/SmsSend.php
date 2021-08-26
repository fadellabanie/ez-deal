<?php

namespace App\Http\Interfaces\Senders;

use App\Http\Interfaces\Senders\SendableInterface;
use App\Http\Traits\Sms;

class SmsSend implements SendableInterface
{
    use Sms;

    public $to; ## Mobile Number 966530976456
    public $message; ## English Message

    public function __construct($to, $message)
    {
        $this->to = $to;
        $this->message = $message;
    }
    public function notifiable()
    {
        $this->sendSMS($this->to, $this->message);
    }
}
