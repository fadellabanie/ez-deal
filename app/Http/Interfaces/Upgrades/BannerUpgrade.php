<?php

namespace App\Http\Interfaces\Upgrades;

use App\Models\AppBanner;
use App\Models\RealEstate;
use App\Http\Interfaces\Upgrades\UpgradeableInterface;

class BannerUpgrade implements UpgradeableInterface
{
    public $real_estate_id;
    public function __construct($real_estate_id)
    {
        $this->real_estate_id = $real_estate_id;
    }
    public function upgrade()
    {
        $realEstate = RealEstate::find($this->real_estate_id);

        AppBanner::create([
            'real_estate_id' =>$realEstate->id,
            'image' => $realEstate->medias->first()->image,
            'start_date'=> now(),
            'end_date'=> now()->addDays(4),
            'status'=> true,
        ]);
    }
}