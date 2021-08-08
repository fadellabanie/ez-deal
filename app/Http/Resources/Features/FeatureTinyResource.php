<?php

namespace App\Http\Resources\Features;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureTinyResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'count' => $this->count,
            'icon' => asset($this->icon),
        ];
    }
}