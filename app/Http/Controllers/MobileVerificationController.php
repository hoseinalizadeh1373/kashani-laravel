<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ContactVerification\MobileVerificationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileVerificationController extends Controller
{
    use MobileVerificationStatus;
    
    public function checkVerification(Request $request){
        $this->validate($request,[
            "mobile"=>"required|exists:users,mobile"
        ]);

        $user=$this->getUserByMobile($request->mobile);
        $verification = $user->doMobileVerification($request->code);

        if($verification){
            Auth::login($user);
            return response()->json([
                    "success"=>true,
            ]);
        }

        return response()->json([
                "success"=>false,
        ]);   

    }

    private function getUserByMobile($mobile){
        return User::whereMobile($mobile)->first();
    }

}
