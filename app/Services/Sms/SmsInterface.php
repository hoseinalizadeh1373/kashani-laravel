<?php

namespace App\Services\Sms;

interface SmsInterface
{
    public function send($message);
}