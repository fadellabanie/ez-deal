<?php

namespace App\Http\Resources\RealEstates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Constants\ImageResource;

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
            'user' => [
                'username' => $this->user->name,
                'mobile' => $this->user->mobile,
                'avatar' => asset($this->user->avatar),
             ],
            'city' => $this->city->name,
            'realestate_type' => $this->realestateType->name,
            'price' => $this->price,
            'space' => $this->space,
            'address' => $this->address,
            'number_building' => $this->number_building,
            'street_width' => $this->street_width,
            'street_number' => $this->street_number,
            'age_building' => $this->age_building,
            'neighborhood' => $this->neighborhood->name,
            'species' => species($this->species) ?? "",
            'view' => $this->view->name,
            'number_of_views' => $this->number_of_views,
            'is_favorites' => $is_favorites == null ? false : true,
            'type_of_owner' => $this->type_of_owner,
            'images' => ImageResource::collection($this->medias),
        ];
    }
}