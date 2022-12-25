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
        
        if($user->isVerified())
            dd("verified");
        
        $user->sendVerificationCode();
        
        // $user->verifyMobile(5555);
    }
}
