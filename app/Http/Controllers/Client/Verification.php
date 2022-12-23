<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Verification extends Controller
{
    public function verification(){
        return view("client.verification");
    }

    public function checkCodeMelliAndMobile(Request $request){

    }

    public function sendMobileVerificationSms(){

    }

    public function checkMobileVerificationSms(){

    }

    
}
