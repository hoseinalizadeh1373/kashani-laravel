<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VerifyContactMobile;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        $user = User::find(1);
        

        if(!$user->doMobileVerification(70726)){
            dd("code wrong");
        }

        if($user->isVerified())
            dd("verified");
        
        $user->sendMobileVerificationCode();
        
        // $user->verifyMobile(5555);
    }
}
