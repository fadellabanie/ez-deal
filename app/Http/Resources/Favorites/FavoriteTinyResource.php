<?php

namespace App\Http\Resources\Favorites;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'city' => $this->realEstate->city->name,
            'price' => $this->realEstate->price,
            'space' => $this->realEstate->space,
            'number_building' => $this->realEstate->number_building,
            'street_width' => $this->realEstate->street_width,
            'street_number' => $this->realEstate->street_number,
            'view' => $this->realEstate->view->name,
            'number_of_views' => $this->realEstate->number_of_views,
            'type_of_owner' => $this->realEstate->type_of_owner,
            'image' => asset($this->realEstate->medias->first()->image ?? ""),
        ];
    }
}