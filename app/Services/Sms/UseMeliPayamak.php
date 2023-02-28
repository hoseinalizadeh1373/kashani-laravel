<?php

namespace App\Services\Sms;

use Melipayamak\Laravel\Facade as MeliPayamak;

class UseMeliPayamak implements SmsInterface
{

    private $client;

    public function __construct()
    {
        $this->client = Melipayamak::sms();
        
    }

    public function sendPattern($patternId,$to,$args){
        
    }

    public function send($message,$to){
        try{
            $text = 'تست وب سرویس ملی پیامک';
            $response = $this->client->send("09370331680","",$message);
            $json = json_decode($response);
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    public function credit(){

    }

}