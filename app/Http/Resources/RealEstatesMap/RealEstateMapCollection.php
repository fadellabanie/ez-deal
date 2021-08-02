<?php

namespace App\Http\Resources\RealEstatesMap;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RealEstateMapCollection extends ResourceCollection
{

    public $collects = RealEstateTinyMapResource::class;

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
