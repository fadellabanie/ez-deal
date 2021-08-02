<?php

namespace App\Models;

use App\Services\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{  
    
    use HasFactory,Translatable;

    protected $translatedAttributes = [
        'name'
    ];
    protected $fillable = [
        'country_id',
        'ar_name',
        'en_name',
        'icon',
        'status',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
