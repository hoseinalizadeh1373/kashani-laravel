<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;

class SmsLoginController extends Controller
{
    const USER_NOT_REGISTERED = 101;
    const MOBILE_NOT_BELONGS_TO_USER = 102;
    const USER_EXISTS = 103;
    const MOBILE_REGISTERED_FOR_ANOTHER_USER = 104;
    const USER_REGISTERED_WITH_ANOTHER_MOBILE = 105;

    public function login(Request $request){

        $this->validate($request, [
            "mobile"=>"required|numeric|digits:11",
            "national_code"=> "sometimes|nullable|numeric|digits:10"
        ]);

        try{
            $user = $this->getUser($request);
        }
        catch(Exception $e){
            $status = $e->getMessage();
            return response()->json([
                "success" => false,
                "status_code" => $status,
                "status_message" => $this->getStatusMessage($status)
            ]);
       }
        
        $user->sendMobileVerificationCode();

        return response()->json([
            "success"=>true,
        ]);

    }

    private function getUser($request){

        $user = $this->getUserByMobile($request->mobile);

        if(!$user and !$request->national_code){
            throw new Exception(self::USER_NOT_REGISTERED);
        }

        $searchLine = new \App\Services\Searchline\Searchline;

        if(!$user){
            $mobileBelogsToUser = $searchLine->isMobileBelongsToPerson($request->mobile, $request->national_code);
            if(!$mobileBelogsToUser){
                throw new Exception(self::MOBILE_NOT_BELONGS_TO_USER);
            }
            $user = $this->registerUser($request);
        }

        return $user;
    }


    private function getUserByMobile($mobile){
        return User::whereMobile($mobile)->first();
    }

    private function registerUser($request){
        return User::create([
            "mobile"=>$request->mobile,
            "national_code"=>$request->national_code,
        ]);
    }
    

    function getStatusMessage($status) {

        $class = new ReflectionClass ( self::class );
        $constants = $class->getConstants();

        foreach ( $constants as $name => $value )
            if ( $value == $status ) return $name;

    }
}
