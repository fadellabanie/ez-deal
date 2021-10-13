<?php

namespace App\Http\Resources\Orders;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderTinyResource extends JsonResource
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
            'user_mobile' => $this->user->mobile,
            'city' => $this->city->name,
            'realestate_type' => $this->realestateType->name,
            'price' => $this->price,
            'space' => $this->space,
            'number_building' => $this->number_building,
            'street_width' => $this->street_width,
            'street_number' => $this->street_number,
            'age_building' => $this->age_building,
            'neighborhood' => $this->neighborhood->name,
            'view' => $this->view->name,
            'number_of_views' => $this->number_of_views,
            'address' => $this->address,
        ];
    }
}