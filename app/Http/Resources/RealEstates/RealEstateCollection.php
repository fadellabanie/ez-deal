<?php

namespace App\Http\Resources\RealEstates;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RealEstateCollection extends ResourceCollection
{

    public $collects = RealEstateTinyResource::class;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'status' => 1,
            'message' => __('Success Request'),
            'data' => parent::toArray($request),
        ];
    }
}
