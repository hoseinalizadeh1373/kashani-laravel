<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Log;

class FakeSmsPanel implements SmsInterface
{

    private $client;

    public function send($message,$to){
       Log::info("fake sms sent",["message"=>$message,"to"=>$to]);
    }

    public function sendPattern($patternId,$to,$args){
       Log::info("fake pattern sms sent",["patternId"=>$patternId,"to"=>$to,"args"=>$args]);        
    }


    public function credit(){

    }
}