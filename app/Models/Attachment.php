<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'attachments';
    protected $fillable = ['path','disk','mime_type','deleted_at'];
}
