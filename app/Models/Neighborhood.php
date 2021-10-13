<?php

namespace App\Models;

use App\Services\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Neighborhood extends Model
{
    use HasFactory,Translatable,LogsActivity;

    protected $translatedAttributes = [
        'name'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }
    protected $fillable = [
        'country_id',
        'city_id',
        'ar_name',
        'en_name',
        'icon',
        'status',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    } 
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
