<?php

namespace App\Http\Resources\Constants;

use Illuminate\Http\Resources\Json\JsonResource;

class ConstResource extends JsonResource
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
            'views' => ViewResource::collection($this['views']),
            'contract_type' => ContractTypeResource::collection($this['contract_type']),
            'cities' => CityResource::collection($this['cities']),
            'realestate_type' => RealEstateTypeResource::collection($this['realestate_type']),
        ];
    }
}
