<?php

namespace App\Models;

use App\Services\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory,Translatable;

    protected $translatedAttributes = [
        'name'
    ];
    protected $fillable = [
        'ar_name',
        'en_name',
        'icon',
        'status',
    ];
}
