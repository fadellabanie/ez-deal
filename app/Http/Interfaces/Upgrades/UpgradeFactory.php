<?php

namespace App\Http\Interfaces\Upgrades;

use App\Http\Interfaces\Upgrades\UpgradeableInterface;

class UpgradeFactory
{
    public function initialize(string $type,$real_estate_id,$end_date =""): UpgradeableInterface
    {
        switch ($type) {
            case 'special':
                return new SpecialUpgrade($real_estate_id);
            case 'city-story':
                return new CityStoreUpgrade($real_estate_id,$end_date);
            case 'country-story':
                return new CountryStoreUpgrade($real_estate_id,$end_date); 
            case 'banner':
                return new BannerUpgrade($real_estate_id,$end_date); 
            case 'snap-chat':
                return new SnapchatUpgrade($real_estate_id);
            default:
                throw new \Exception("Upgrade method not supported");
            break;
        }
    }
}
