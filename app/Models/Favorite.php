<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'real_estate_id',
        'user_id',
    ];

    public function scopeOwner($query)
    {
        return $query->where('user_id', Auth::id());
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function realEstate()
    {
        return $this->belongsTo(RealEstate::class, 'real_estate_id');
    }
}
