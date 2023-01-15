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
            $response = $this->client->send($to,"",$text);
            $json = json_decode($response);
            echo $json->Value; //RecId or Error Number 
            dd("ASDasasdsasd");
        }catch(\Exception $e){
            dd("Asd");
            dd($e->getMessage());
        }
    }

    public function credit(){

    }

}