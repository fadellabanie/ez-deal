<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'suspicious_user_id',
        'note',
        'start_date',
        'end_date',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function suspiciousUser()
    {
        return $this->belongsTo(User::class,'suspicious_user_id');
    }

}
