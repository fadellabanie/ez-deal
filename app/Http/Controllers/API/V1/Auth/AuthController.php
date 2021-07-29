<?php

namespace App\Http\Controllers\API\V1\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Verify;
use App\Models\UserToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\VerifyRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;

class AuthController extends Controller
{
    /**
     * Register new user
     * @param  RegisterRequest $request
     * @return mixed
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'type' => $request->type,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'country_code' => $request->country_code,
            //'whatsapp_mobile' => $request->whatsapp_mobile,
            //'avatar' => upload($request->avatar, 'users'),
            'trading_certification' => $request->trading_certification,
            'password' => bcrypt($request->password),
            'device_token' => $request->device_token,
           
        ]);

        $token = $user->createToken('Token-Login')->accessToken;

        $user->update([
            'remember_token' => $token,
            'device_token' => $request->device_token,
        ]);

        $user->userToken()->create([
            'token' => $token,
            'device_id' => $request->device_id,
            'device_type' => $request->device_type,
        ]);
         
        $this->sendCode($request->mobile);

        return $this->successStatus(__("send code to your number"));
      //  return $this->respondWithItem(new UserResource($user));
    }
    /**
     * Login
     * @param  LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {

        if (!Auth::attempt($request->only('mobile', 'password'))) {

            return $this->errorStatus(__('Unauthorized'));
        }
        $user = Auth::user();

        $token = $user->createToken('Token-Login')->accessToken;

        $user->update([
            'remember_token' => $token,
            'device_token' => $request->device_token,
        ]);

        return $this->respondWithItem(new UserResource($user));
    }

    public function show(Request $request)
    {
        $user = User::find($request->user_id);

        return $this->respondWithItem(new UserResource($user));
    }
    /**
     * Send Code Use SMS 
     * @param  LoginRequest $request
     * @return mixed
     */
    public function sendCode($mobile)
    {
        $verificationCode = 4444;
        //$verificationCode = mt_rand(1000, 9999);
     
        Verify::create([
            'mobile' => $mobile,
            'verification_code' => $verificationCode,
            'type' => 'check',
            'verification_expiry_minutes' => Carbon::now()->addMinute(5),
        ]);
        $mobile = (int)$mobile;
        $message = "كود التفعيل الخاص بك هو {$verificationCode}";

        // SMS 
        // Unifonic::send($mobile, $message);

        return $this->successStatus(__('Send SMS Successfully Please Check Your Phone ' . $verificationCode));
    }
    /**
     * Check Captains 
     * @param  VerifyRequest $request
     * @return mixed
     */
    public function check(VerifyRequest $request)
    {
        $user = User::whereMobile($request->mobile)->first();

        //check if passenger has verification code
        $verify = Verify::whereMobile($request->mobile)->latest()->first();

        if (empty($verify->verification_code)) {
            return $this->errorStatus(__('Verification code is missing'));
        }

        if ($verify->verification_code != $request->verification_code) {
            return $this->errorStatus(__('Verification code is wrong'));
        }


        if (Carbon::parse($verify->verification_expiry_minutes)->lte(Carbon::now())) {
            return $this->errorStatus(__('Verification code is expired'));
        }

        //    $data = DB::table('oauth_access_tokens')->where('user_id',$passenger->id)->get();

        //    if($data){
        //     DB::table('oauth_access_tokens')->where('user_id',$passenger->id)->delete();
        //    }
        $token = $user->createToken('Token-User')->accessToken;

        $user->update([
            'remember_token' => $token,
            
        ]);

        return $this->respondWithItem(new UserResource($user));
    }
    /**
     * Logout Passenger
     * @return mixed
     */
    public function logout()
    {
        Auth::user()->token()->revoke();

        return $this->respondWithMessage(__('successfully logout'));
    }
}
