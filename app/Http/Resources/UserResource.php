<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Boolean;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'trading_certification' => $this->trading_certification,
            'avatar' => asset($this->avatar),
           // 'status' => $this->status,
            'type' => $this->type,
            'is_dark' => (Boolean) $this->is_dark,
            'created_at' => (string) $this->created_at,
            'verified' =>(string) $this->verified_at,
            'token_type' => 'Bearer',
            'access_token' => $this->remember_token,
        ];
    }
}
