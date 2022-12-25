<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Log;

class FakeSmsPanel implements SmsInterface
{

    private $client;

    public function send($message,$to){
       Log::info("fake sms sent",["message"=>$message,"to"=>$to]);
    }

    public function credit(){

    }
}