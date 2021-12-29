<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Mobile extends Model
{
    use SoftDeletes;
    protected $table = 'nl_mobiles';
    protected $fillable = ['mobile','vote_negative','vote_positive','vote_other','count_comment','count_views','vote_negative_me','vote_positive_me'];
}
