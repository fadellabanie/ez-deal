<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\Dashboard\ConstantController;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens,LogsActivity,HasRoles;
   
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }

    protected $fillable = [
        'name',
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
        'is_dark',
        'suspend',
        'block_date',
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

    public function scopeNotAdmin($query)
    {
        return $query->where('type','!=',ConstantController::ADMIN);
    } 
    


    public function city()
    {
        return $this->belongsTo(City::class);
    } 
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
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
     /**
     * Get all favorite of properties.
     */
    public function attribute()
    {
        return $this->belongsToMany(Attribute::class,'user_attribute','user_id','attribute_id')->withPivot('count', 'expiry_date','is_expiry');
    }
}
