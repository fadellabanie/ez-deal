<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username',
        'email',
        'country_code',
        'mobile',
        'whatsapp_mobile',
        'password',
        'type',
        'status',
        'avatar',
        'trading_certification',
        'remember_token',
        'device_token',
        'verified_at',
        'city_id',
        'package_id',
        'subscribe_to',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

     
  


    public function verifyUser()
    {
        return $this->hasOne(VerifyUser::class);
    }

    public function userToken()
    {
        return $this->hasOne(UserToken::class);
    }

     /**
    * Verify user mobile number
    * @return true
    */
    public function verify()
    {
        $this->verified = true;

        $this->save();

        $this->verifyUser()->delete();
    }
    /**
     * Get all favorite of properties.
     */
    public function favorite()
    {
        return $this->belongsToMany(Realestate::class,'favourites')->withPivot('user_id', 'property_id');
    } 
    
    /**
     * Get all favorite of properties.
     */
    public function attribute()
    {
        return $this->belongsToMany(Attribute::class,'user_attribute','attribute_id','user_id')->withPivot('user_id', 'property_id');
    }
}
