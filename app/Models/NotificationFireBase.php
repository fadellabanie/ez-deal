<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificationFireBase extends Model
{
    use HasFactory;
    public $table = 'notifications';
    protected $fillable = [
        'type', 'title', 'content', 'status',
    ];
}
