<?php

namespace App\Http\Resources\Favorites;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Constants\ImageResource;

class FavoriteTinyResource extends JsonResource
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
            'id' => $this->realEstate->id,
            'user' => [
                'username' => $this->user->name,
                'mobile' => $this->user->mobile,
                'avatar' => asset($this->user->avatar),
             ],
            'name' => $this->realEstate->name,
            'city' => $this->realEstate->city->name,
            'country' => $this->realEstate->country->name,
            'realestate_type_id' => $this->realEstate->realestateType->name,
            'contract_type_id' => $this->realEstate->contractType->name,
            'price' => $this->realEstate->price,
            'space' => $this->realEstate->space,
            'number_building' => $this->realEstate->number_building,
            'street_width' => $this->realEstate->street_width,
            'street_number' => $this->realEstate->street_number,
            'view' => $this->realEstate->view->name,
            'neighborhood' => $this->neighborhood ?? "",
            'age_building' => $this->realEstate->age_building,
            'video_url' => $this->realEstate->video_url,
            'elevator' => (Boolean)$this->realEstate->elevator,
            'parking' => (Boolean)$this->realEstate->parking,
            'ac' => (Boolean)$this->realEstate->ac,
            'furniture' => (Boolean)$this->realEstate->furniture,
            'note' => $this->realEstate->note,
            'type' => $this->realEstate->type,
            'type_of_owner' => $this->realEstate->type_of_owner,
            'number_card' => $this->realEstate->number_card,
            'lat' => $this->realEstate->lat,
            'lng' => $this->realEstate->lng,
            'address' => $this->realEstate->address,
            'number_of_views' => $this->realEstate->number_of_views,
            'created_at' => $this->realEstate->created_at->format('Y-m-d'),

            'images' => ImageResource::collection($this->realEstate->medias),
        ];
    }
}