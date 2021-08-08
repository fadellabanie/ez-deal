<?php

namespace App\Http\Interfaces\Upgrades;

use App\Http\Interfaces\Upgrades\UpgradeableInterface;
use App\Models\RealEstate;
use App\Models\Story;

class CityStoreUpgrade implements UpgradeableInterface
{
    public $real_estate_id;
    public function __construct($real_estate_id)
    {
        $this->real_estate_id = $real_estate_id;
    }

    public function upgrade()
    {
       $realEstate = RealEstate::find($this->real_estate_id);
        Story::create([
            'user_id' => $realEstate->user_id,
            'title' => $realEstate->name,
            'image' => $realEstate->medias->first()->image,
            'country_id'=> $realEstate->country_id,
            'city_id'=> $realEstate->city_id,
            'start_date'=> now(),
            'end_date'=> now()->addDays(4),
            'status'=> true,
        ]);
    }
}