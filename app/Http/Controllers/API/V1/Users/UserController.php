<?php

namespace App\Http\Controllers\API\V1\Users;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ReportUser;
use Illuminate\Http\Request;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Services\SubscriptionService;
use App\Http\Requests\Api\Users\UpdateRequest;
use App\Http\Resources\Constants\NotificationResource;

class UserController extends Controller
{

    public function show()
    {
        return $this->respondWithItem(new UserResource(Auth::user()));
    }

    public function update(UpdateRequest $request)
    {
        $user = User::find(AUth::id());

        if (!$user) $this->errorNotFound();
        if ($request->has('avatar')) {
            $user->update([
                'email' => $request->email,
                'name' => $request->username,
                //'avatar' => upload($request->avatar, 'users'),
                'avatar' => $request->avatar,
            ]);
        } else {

            $user->update([
                'email' => $request->email,
                'name' => $request->username,
            ]);
        }

        return $this->successStatus(__("Update profile successfully"));
    }

    public function report(Request $request)
    {
        ReportUser::create([
            'user_id' => Auth::id(),
            'suspicious_user_id' => $request->user_id,
            'note' => $request->note,
        ]);

        return $this->successStatus(__("Report user successfully"));
    }
    public function subscription(Request $request)
    {
        $request['user_id'] = Auth::id();
        $response = SubscriptionService::subscription($request);

        if (!$response['success']) {
            return $this->errorStatus($response['message']);
        }

        $title = __("Subscription");
        $body = __("Subscription package Success");
        $this->send(Auth::user()->device_token, $title, $body);

        return $this->successStatus(__("Subscription successfully"));
    }

    public function myNotification()
    {
        $notifications = NotificationUser::where('user_id', Auth::id())
            ->whereType('firebase-notification')
            ->get();

        return $this->respondWithItem(NotificationResource::collection($notifications));
    }
}
