<?php

namespace App\Http\Interfaces\Upgrades;

use App\Models\RealEstate;
use App\Http\Interfaces\Upgrades\UpgradeableInterface;

class SpecialUpgrade implements UpgradeableInterface
{
    public $real_estate_id;
    public function __construct($real_estate_id)
    {
        $this->real_estate_id = $real_estate_id;
    }
    public function upgrade()
    {
        RealEstate::whereId($this->real_estate_id)->update([
            'type' =>  'special'
        ]);
    }
}