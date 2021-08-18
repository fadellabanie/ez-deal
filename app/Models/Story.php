<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'city_id',
        'country_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    } 
     public function scopeMyCityStory($query,$city_id = 1)
    {
        return $query->where('city_id',$city_id);
    }  
    public function scopeMyCountryStory($query,$city_id)
    {
        return $query->where('country_id', getCountry($city_id));
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
