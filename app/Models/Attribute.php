<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Translatable;

class Attribute extends Model
{
    use HasFactory,Translatable;

    protected $translatedAttributes = [
        'name',
        'description',
    ];
    protected $fillable = [
        'ar_name',
        'en_name',
        'slug',
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
