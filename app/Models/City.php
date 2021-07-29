<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'governorate_id',
        'ar_name',
        'en_name',
        'icon',
        'status',
    ];
}
