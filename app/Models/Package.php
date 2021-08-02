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
        'ar_name',
        'en_name',
        'ar_description',
        'en_description',
        'price',
        'days',
        'status',
    ];
}
