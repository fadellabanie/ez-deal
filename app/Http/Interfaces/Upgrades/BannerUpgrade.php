<?php

namespace App\Http\Interfaces\Upgrades;

use App\Models\AppBanner;
use App\Models\RealEstate;
use App\Http\Interfaces\Upgrades\UpgradeableInterface;

class BannerUpgrade implements UpgradeableInterface
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

        AppBanner::create([
            'real_estate_id' =>$realEstate->id,
            'image' => $realEstate->medias->first()->image,
            'start_date'=> now(),
            'end_date'=>$this->end_date,
            'status'=> true,
        ]);
    }
}