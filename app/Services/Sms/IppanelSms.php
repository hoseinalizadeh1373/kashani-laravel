<?php

namespace App\Services\Sms;

use PDO;

class IppanelSms implements SmsInterface
{

    private $client;

    public function __construct()
    {
        $apiKey = env("IPPANEL_API_KEY");
        $this->client = new \IPPanel\Client($apiKey);
    }

    public function send($message,$to){
       dd("$message");
    }

    public function credit(){

    }

    public function sendWithPattern($message,$to){

    }
}