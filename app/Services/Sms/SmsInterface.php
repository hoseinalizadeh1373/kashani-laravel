<?php

namespace App\Services\Sms;

interface SmsInterface
{
    public function credit();
    public function send($message,$to);
}