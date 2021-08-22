<?php

namespace App\Http\Resources\RealEstates;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class RealEstateTinyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        $is_favorites = DB::table('favorites')
        ->where('real_estate_id',$this->id)
        ->where('user_id',Auth::id())->first();
       
        return [
            'id' => $this->id,
            'city' => $this->city->name,
            'price' => $this->price,
            'space' => $this->space,
            'number_building' => $this->number_building,
            'street_width' => $this->street_width,
            'street_number' => $this->street_number,
            'view' => $this->view,
            'number_of_views' => $this->number_of_views,
            'is_favorites' => $is_favorites == null ? false : true,
            'type_of_owner' => $this->type_of_owner,
            'image' => asset($this->medias->first()->image),
        ];
    }
}