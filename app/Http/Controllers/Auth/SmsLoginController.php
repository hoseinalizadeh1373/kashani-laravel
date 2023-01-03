<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;
use \App\Exceptions\SmsLoginGetUserException;

class SmsLoginController extends Controller
{
    public const USER_NOT_REGISTERED = 101;
    public const MOBILE_NOT_BELONGS_TO_USER = 102;
    public const USER_EXISTS = 103;
    public const MOBILE_REGISTERED_FOR_ANOTHER_USER = 104;
    public const USER_REGISTERED_WITH_ANOTHER_MOBILE = 105;
    public const UNKNOWN_SERVER_ERROR = 500;

    public function login(Request $request)
    {
        $this->validate($request, [
            "mobile"=>"required|numeric|digits:11",
            "national_code"=> "sometimes|nullable|numeric|digits:10"
        ]);

        try {
            $user = $this->getUser($request);
        } catch(Exception $e) {
            
            $status = (int) ($e->getCode());

            if ($status <= 100 or $status >= 110) {
                $status = 500;
                $message = "UNKNOWN"
            }

            return response()->json([
                "success" => false,
                "status_code" => $status,
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
        $verification = $user->doMobileVerification($request->code);

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
            throw new SmsLoginGetUserException(self::USER_NOT_REGISTERED);
        }

        $searchLine = new \App\Services\Searchline\Searchline();

        if (!$user) {
            $mobileBelogsToUser = $searchLine->isMobileBelongsToPerson($request->mobile, $request->national_code);
            if (!$mobileBelogsToUser) {
                throw new SmsLoginGetUserException(self::MOBILE_NOT_BELONGS_TO_USER);
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

/* 
    public function getStatusMessage($status)
    {
        $class = new ReflectionClass(self::class);
        $constants = $class->getConstants();

        foreach ($constants as $name => $value) {
            if ($value == $status) {
                return $name;
            }
        }
    } */
}
