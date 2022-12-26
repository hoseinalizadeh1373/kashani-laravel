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

    public function doMobileVerification($verificationCode){
        
        $token = $this->getLastToken();
        
        if($token != $verificationCode){
            return false;
        }

        $this->mobile_verified_at = Carbon::now();
        $this->save();

        return true;

    }

    public function getLastToken(){
        return MobileVerificationToken::getLastTokenOf($this->mobile)->token;
    }

    public function isVerified(){
        return (bool) $this->mobile_verified_at;
    }

    public function sendMobileVerificationCode(){
        $verificationCode = $this->createMobileVerificationCode();
        $this->notify(new \App\Notifications\VerifyContactMobile($verificationCode));
    }
    
}