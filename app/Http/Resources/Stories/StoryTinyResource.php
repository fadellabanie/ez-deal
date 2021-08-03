<?php

namespace App\Http\Resources\Stories;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryTinyResource extends JsonResource
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
            'title' => $this->title,
            'image' => asset($this->image),
        ];
    }
}