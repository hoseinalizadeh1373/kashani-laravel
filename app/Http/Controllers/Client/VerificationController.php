<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Sms\SmsInterface;
use Illuminate\Http\Request;

class verificationController
 extends Controller
{
    public function verification(){
        return view("client.verification");
    }

    public function checkCodeMelliAndMobile(Request $request){

    }

    public function sendMobileVerificationSms(SmsInterface $sms){
        
    }

    public function checkMobileVerificationSms(){

    }

    
}
