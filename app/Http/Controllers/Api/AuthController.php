<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\ContactVerification\SmsLoginGetUserException;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','logout', 'requestToken']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            "mobile"=>"required",
            "password"=>"required",
        ]);
        $credentials = request(['mobile', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginWithToken(Request $request)
    {
        $this->validate($request, [
            "mobile"=>"required|exists:users,mobile",
            "code"=>"required",
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

    /**
     * .
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function requestToken(Request $request)
    {
        $this->validate($request, [
            "mobile"=>"required|exists:users",
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
}