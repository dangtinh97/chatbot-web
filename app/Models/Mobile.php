<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobile extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'nl_mobiles';
    protected $fillable = ['mobile','vote_negative','vote_positive','vote_other','count_comment','count_views'];
}
