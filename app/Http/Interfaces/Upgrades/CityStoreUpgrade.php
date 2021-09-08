<?php

namespace App\Http\Interfaces\Upgrades;

use App\Models\Story;
use App\Models\RealEstate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Upgrades\UpgradeableInterface;

class CityStoreUpgrade implements UpgradeableInterface
{
    public $real_estate_id;
    public $end_date;

    public function __construct($real_estate_id,$end_date)
    {
        $this->real_estate_id = $real_estate_id;
        $this->end_date = $end_date;
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
            'end_date'=> $this->end_date,
            'status'=> true,
        ]);
    }
}