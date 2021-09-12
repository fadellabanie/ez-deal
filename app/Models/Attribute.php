<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Attribute extends Model
{
    use HasFactory,Translatable,LogsActivity;

    protected $translatedAttributes = [
        'name',
        'description',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }


    protected $fillable = [
        'slug',
        'ar_name',
        'en_name',
        'ar_description',
        'en_description',
        'price',
        'days',
        'icon',
        'is_active',
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    } 
    public function package()
    {
        return $this->belongsToMany(Package::class,'package_attribute','attribute_id','package_id');
    }
      public function user()
    {
        return $this->belongsToMany(User::class,'user_attribute','attribute_id','user_id');
    }
}
