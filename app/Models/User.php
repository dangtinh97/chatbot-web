<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';


    public function tarots()
    {
        return $this->hasMany(UserTarot::class,'user_id','id');
    }
}
