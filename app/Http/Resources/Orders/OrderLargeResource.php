<?php

namespace App\Http\Resources\Orders;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderLargeResource extends JsonResource
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
            'city' => $this->city->name,
            'price' => $this->price,
            'space' => $this->space,
            'number_building' => $this->number_building,
            'street_width' => $this->street_width,
            'street_number' => $this->street_number,
            'view' => $this->view,
            'number_of_views' => $this->number_of_views,
        ];
    }
}