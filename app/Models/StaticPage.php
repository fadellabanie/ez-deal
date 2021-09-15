<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class StaticPage extends Model
{
    use HasFactory,Translatable,LogsActivity;

   
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }
    protected $fillable = [
        'type',
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
    ];

    protected $translatedAttributes = [
        'name','description'
    ];
}
