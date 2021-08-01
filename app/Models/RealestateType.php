<?php

namespace App\Models;

use App\Services\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealestateType extends Model
{
    use HasFactory,Translatable;

    protected $translatedAttributes = [
        'name'
    ];
}
