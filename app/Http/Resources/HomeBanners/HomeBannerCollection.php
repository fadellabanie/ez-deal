<?php

namespace App\Http\Resources\HomeBanners;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HomeBannerCollection extends ResourceCollection
{

    public $collects = HomeBannerTinyResource::class;

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
