<?php

namespace App\Services\Sms;

class Sms implements SmsInterface
{
    public function send($message){
        \Log::alert($message);
    }
}