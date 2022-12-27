<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileVerificationController extends Controller
{
    const USER_NOT_REGISTERED = 101;
    const MOBILE_NOT_BELONGS_TO_USER = 102;
    const USER_EXISTS = 103;
    const MOBILE_REGISTERED_FOR_ANOTHER_USER = 104;
    const USER_REGISTERED_WITH_ANOTHER_MOBILE = 105;

    public function sendCode(Request $request){

        $user = $this->getUserWithMobile($request->mobile);
        
        if(!$user and !$request->has("national_code")){
            return response()->json([
                "success" => false,
                "status_code" => self::USER_NOT_REGISTERED,
                "error_message" => "USER_NOT_REGISTERED",
            ]);
        }

        if(!$user){
            $mobileBelogsToUser = Serchline::isMobileBelongsToPerson($request->national_code);
            if(!$mobileBelogsToUser){
                return response()->json([
                    "success" => false,
                    "status_code" => self::MOBILE_NOT_BELONGS_TO_USER,
                    "error_message" => "MOBILE_NOT_BELONGS_TO_USER",
                ]);
            }

            $user = $this->registerUser($request);

        }
        
        $user->sendMobileVerificationCode();

        return response()->json([
            "success"=>true,
        ]);

    }

    public function check(Request $request){

        $user=$this->getUserWithMobile($request->mobile);
        $verification = $user->doMobileVerification($request->code);

        if($verification){
            Auth::login($user);
            $data = [
                "success"=>true,
            ];
        }
        else 
        {
            $data=[
                "success"=>false,
            ];
        }   
     
        return response()->json($data);
        
    }

    private function getUserWithMobile($mobile){
        return User::whereMobile($mobile)->first();
    }
}
