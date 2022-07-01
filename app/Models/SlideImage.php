<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideImage extends Model
{
    use HasFactory;
    protected $table = 'slide_images';
    protected $fillable = ['uuid','user_id','attachment_id','view','created_at','updated_at'];
}
