<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBroadcast extends Model
{
    use HasFactory;
    protected $table = 'logs_broadcast';
    protected $fillable = ['user_id','content','response','name_event'];
}
