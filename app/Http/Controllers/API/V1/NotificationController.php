<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Services\Notification;
use App\Models\NotificationUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Constants\NotificationResource;

class NotificationController extends Controller
{

    public function myNotification()
    {
        $notifications = NotificationUser::where('user_id',Auth::id())->get();

        return $this->respondWithCollection(NotificationResource::collection($notifications));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendFCM(Request $request)
    {
        $user =User::find($request->to);

        $this->notification->send($user->device_token,$request->title,$request->body);

        return $this->successStatus();
    }

}
