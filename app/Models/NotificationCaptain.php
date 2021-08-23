<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationCaptain extends Model
{
    use HasFactory;
    protected $fillable = [
        'captain_id', 'notification_id', 'status', 'readed_at', 
    ];
   

    #################
    ### Relations ###
    #################

    
    public function captain()
    {
        return $this->belongsTo(Captain::class, 'captain_id');
    }
 
   
    public function notification()
    {
        return $this->belongsTo(NotificationFireBase::class, 'notification_id');
    }
}
