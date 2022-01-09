<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ErrorException extends Model
{
    protected $collection = 'errors_exception';
    protected $fillable = ['code','message','file','line','content'];
}
