<?php

namespace App\Models;

use App\Services\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory, Translatable;

    protected $translatedAttributes = [
        'name',
        'description',
    ];

    protected $fillable = [ 
        'slug',
        'ar_name',
        'en_name',
        'ar_description',
        'en_description',
        'price',
        'icon',
        'status',
    ];
    public function scopeActive($query)
    {
        return $query->where('status', true);
    } 

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,'package_attribute','package_id','attribute_id');
    }
}
