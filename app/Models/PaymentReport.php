<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_id',
        'amount',
        'track_id',
        'trandata_request',
        'payment_id',
        'trandata_respond',
        'data',
        'transId',
        'card_type',
        'result',
        'ref',
        'fc_cust_id',
        'payment_timestamp',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
