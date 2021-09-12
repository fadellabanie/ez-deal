<?php

namespace App\Models;

use App\Services\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Package extends Model
{
    use HasFactory, Translatable,LogsActivity;

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
        'color',
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
