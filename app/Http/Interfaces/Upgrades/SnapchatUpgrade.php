<?php

namespace App\Http\Interfaces\Upgrades;

use App\Http\Interfaces\Upgrades\UpgradeableInterface;
use App\Models\SnapchatOrder;

class SnapchatUpgrade implements UpgradeableInterface
{
    public $real_estate_id;
    public function __construct($real_estate_id)
    {
        $this->real_estate_id = $real_estate_id;
    }
    public function upgrade()
    {
        SnapchatOrder::create([
            'real_estate_id' => $this->real_estate_id
        ]);
    }
}
