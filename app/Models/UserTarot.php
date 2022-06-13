<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTarot extends Model
{
    use HasFactory;
    protected $table = 'user_tarots';
    protected $fillable = ['user_id','data','type'];
}
