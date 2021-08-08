<?php

namespace App\Http\Interfaces\Upgrades;

use App\Models\Story;
use App\Models\RealEstate;
use App\Http\Interfaces\Upgrades\UpgradeableInterface;

class CountryStoreUpgrade implements UpgradeableInterface
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