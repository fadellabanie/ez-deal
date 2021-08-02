<?php

namespace App\Http\Resources\RealEstatesMap;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RealEstateMapTinyResource extends JsonResource
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
            'lat' => $this->lat,
            'lng' => $this->lng,
            'type' => $this->type,
        ];
    }
}