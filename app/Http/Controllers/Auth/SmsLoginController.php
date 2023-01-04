<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;
use App\Services\ContactVerification\SmsLoginGetUserException;
use App\Services\ContactVerification\Statuses;

class SmsLoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            "mobile"=>"required|numeric|digits:11",
            "national_code"=> "sometimes|nullable|numeric|digits:10"
        ]);

        try {
            $user = $this->getUser($request);
        } 
        catch(SmsLoginGetUserException $e) {
            
            return response()->json([
                "success" => false,
                "status_code" => $e->getCode(),
                "status_message" => $e->getMessage(),
            ]);
        }
        catch(Exception $e){
            return response()->json([
                "success" => false,
                "status_code" => 500,
                "status_message" => $e->getMessage(),
            ]);
        }

        $user->sendMobileVerificationCode();

        return response()->json([
            "success"=>true,
        ]);
    }

    public function checkVerification(Request $request)
    {
        $this->validate($request, [
            "mobile"=>"required|exists:users,mobile"
        ]);

        $user=$this->getUserByMobile($request->mobile);
        $verification = $user->checkMobileVerifyCode($request->code);

        if ($verification) {
            Auth::login($user);
            return response()->json([
                    "success"=>true,
            ]);
        }

        return response()->json([
                "success"=>false,
        ]);
    }

    private function getUserByMobile($mobile)
    {
        return User::whereMobile($mobile)->first();
    }

    private function getUser($request)
    {
        $user = $this->getUserByMobile($request->mobile);

        if (!$user and !$request->national_code) {
            throw new SmsLoginGetUserException(Statuses::USER_NOT_REGISTERED);
        }

        $searchLine = new \App\Services\Searchline\Searchline();

        if (!$user) {
            $mobileBelogsToUser = $searchLine->isMobileBelongsToPerson($request->mobile, $request->national_code);
            if (!$mobileBelogsToUser) {
                throw new SmsLoginGetUserException(Statuses::MOBILE_NOT_BELONGS_TO_USER);
            }
            $user = $this->registerUser($request);
        }

        return $user;
    }


    private function registerUser($request)
    {
        return User::create([
            "mobile"=>$request->mobile,
            "national_code"=>$request->national_code,
        ]);
    }


}
