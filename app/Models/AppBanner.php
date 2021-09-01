<?php

namespace App\Models;

use App\Services\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class AppBanner extends Model
{
    use HasFactory,Translatable,LogsActivity;
  
    protected $translatedAttributes = [
        'name','description'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'city_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    } 
     public function scopeMyStory($query,$city_id =1 )
    {
        return $query->where('city_id',$city_id);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
