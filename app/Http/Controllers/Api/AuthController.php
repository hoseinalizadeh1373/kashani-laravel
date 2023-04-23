<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Rules\BelongsToNationalCode;
use App\Rules\LoginTokenIsValid;
use App\Services\ContactVerification\SmsLoginGetUserException;
use App\Services\ContactVerification\Statuses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['logout', 'requestToken', 'loginWithToken', 'register']]);
    }

   

    /**
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            "mobile"=>"required|unique:users",
            "national_code"=>['required','unique:users',new BelongsToNationalCode()],
            "firstname"=>"required",
            "lastname"=>"required",
        ]);

        $user = User::create(request(['national_code','mobile','firstname','lastname']));
        $user->sendMobileVerificationCode();

        return response()->json([
            "success"=>true,
        ]);

    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginWithToken(Request $request)
    {
        $this->validate($request, [
            "mobile"=>"required|iran_mobile|exists:users,mobile",
            "token"=>["required",new LoginTokenIsValid()],
        ]);

        $user=$this->getUserByMobile($request->mobile);
        
        $user->checkCrmContactId();
       
        $token = auth('api')->login($user);

        return $this->respondWithToken($token);

    }

    /**
     * .
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function requestToken(Request $request)
    {
        $this->validate(
            $request,
            [
                "mobile"=>"required|iran_mobile|exists:users",
            ],
            [
                "exists"=>"کاربری با این شماره موبایل وجود ندارد، لطفا ثبت نام کنید.",
            ]
        );


        $user = $this->getUserByMobile($request->mobile);
        $user->sendMobileVerificationCode();


        /*
                try {
                    $user = $this->getUser($request);
                } catch(SmsLoginGetUserException $e) {
                    return response()->json([
                        "success" => false,
                        "status_code" => $e->getCode(),
                        "status_message" => $e->getMessage(),
                    ], 400);
                } catch(Exception $e) {
                    return response()->json([
                        "success" => false,
                        "status_code" => 500,
                        "status_message" => $e->getMessage(),
                    ], 500);
                } */

        return response()->json([
            "success"=>true,
        ]);
    }




    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(new UserResource(auth()->user()));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
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
}
