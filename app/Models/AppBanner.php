<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\Translatable;

class AppBanner extends Model
{
    use HasFactory,Translatable;

    protected $translatedAttributes = [
        'name','description'
    ];
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
