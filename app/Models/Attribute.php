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
        'ar_description',
        'en_description',
    ];

    public function package()
    {
        return $this->belongsToMany(Package::class,'package_attribute');
    }
}
