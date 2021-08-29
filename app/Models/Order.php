<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'realestate_type_id',
        'contract_type_id',
        'view_id',
        'city_id',
        'country_id',
        'neighborhood',
        'price',
        'space',
        'number_building',
        'age_building',
        'street_width',
        'street_number',
        'elevator',
        'parking',
        'ac',
        'furniture',
        'name',
        'note',
        'is_active',
        'number_of_views',
        'status',
        'lat',
        'lng',
        'address',
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    } 
     public function scopeOwner($query)
    {
        return $query->where('user_id', Auth::id());
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
        return $this->belongsTo(ContractType::class);
    }
    public function realestateType()
    {
        return $this->belongsTo(RealestateType::class);
    } 
    public function view()
    {
        return $this->belongsTo(View::class);
    }
}
