<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class RealEstate extends Model
{
    public $table = 'realestates';

    use HasFactory;


    protected $fillable = [
        'user_id',
        'realestate_type_id',
        'contract_type_id',
        'view_id',
        'city_id',
        'country_id',
        'name',
        'neighborhood',
        'price',
        'space',
        'number_building',
        'age_building',
        'street_width',
        'street_number',
        'video_url',
        'elevator',
        'parking',
        'ac',
        'furniture',
        'note',
        'is_active',
        'number_of_views',
        'status',
        'cancel_reason',
        'type',
        'type_of_owner',
        'number_card',
        'lat',
        'lng',
        'address',
        'end_date',
        'review_by',
        'review_at',
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->where('end_date','>=',now());
    }
    public function scopeOwner($query)
    {
        return $query->where('user_id', Auth::id());
    }
    public function scopeNotReview($query)
    {
        return $query->where('status',false)->where('review_at', null);
    } 
     public function scopeReview($query)
    {
        return $query->where('status',true)->where('review_at','!=',null);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contractType()
    {
        return $this->hasOne(ContractType::class,'id' ,'contract_type_id');
    }
   

    public function realestateType()
    {
        return $this->belongsTo(RealestateType::class, 'realestate_type_id');
    }
    public function medias()
    {
        return $this->hasMany(RealestateMedia::class, 'realestate_id');
    }
    public function view()
    {
        return $this->belongsTo(View::class);
    }
}
