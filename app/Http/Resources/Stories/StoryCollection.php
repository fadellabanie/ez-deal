<?php

namespace App\Http\Resources\Stories;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StoryCollection extends ResourceCollection
{

    public $collects = StoryTinyResource::class;

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
