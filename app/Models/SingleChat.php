<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class SingleChat extends Model
{
    const STATUS_CLOSE = "CLOSE";
    protected $collection = 'single_chats';
    protected $fillable = ['status'];
    use HasFactory;
}
