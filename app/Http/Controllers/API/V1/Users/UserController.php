<?php

namespace App\Http\Controllers\API\V1\Users;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Verify;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\UpdateRequest;
use App\Http\Requests\Api\Auth\VerifyRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\ChangePasswordRequest;
use App\Models\ReportUser;

class UserController extends Controller
{

    public function show()
    {
        return $this->respondWithItem(new UserResource(Auth::user()));
    }

    public function update(UpdateRequest $request,$id)
    {
        $user = User::find($id);

        if(!$user) $this->errorNotFound();

        $user->update([
            'email' => $request->email,
            'username' => $request->username,
            'image' => upload($request->username,'users'),
        ]);

        return $this->successStatus(__("Update profile successfully"));
    }
   
    public function report(Request $request)
    {
        
        ReportUser::create([
            'user_id' => Auth::id(),
            'suspicious_user_id' => $request->user_id,
        ]);

        return $this->successStatus(__("Report user successfully"));

    }
}
