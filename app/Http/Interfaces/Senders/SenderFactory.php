<?php

namespace App\Http\Interfaces\Senders;

use App\Http\Interfaces\Senders\SendableInterface;


class SenderFactory
{
    public function initialize(string $type, $to, $message, $title = ""): SendableInterface
    {
        switch ($type) {
            case 'firebase-notification':
                return new FirebaseNotificationSend($to, $title, $message);
            case 'sms':
                return new SmsSend($to, $message);
            default:
                throw new \Exception("Sender method not supported");
                break;
        }
    }
}
