<?php 

namespace App\Services\ContactVerification;

use App\Models\MobileVerificationToken;
use Carbon\Carbon;

trait VerifyContactMobile
{
    public function createMobileVerificationCode(){
        $verificationCode = MobileVerificationToken::createToken($this->mobile);
        return $verificationCode->token;
    }

    public function verifyMobile($verificationCode){
        // check if mobile verification code equal to $verificationCode
        $this->mobile_verified_at = Carbon::now();
        $this->save();
        return true;
    }

    public function isVerified(){
        return (bool) $this->mobile_verified_at;
    }

    public function sendVerificationCode(){
        $verificationCode = $this->createMobileVerificationCode();
        $this->notify(new \App\Notifications\VerifyContactMobile($verificationCode));
    }
}