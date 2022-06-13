<?php

namespace App\Repositories;

use App\Models\UserTarot;
use Illuminate\Database\Eloquent\Model;

class UserTarotRepository extends BaseRepository
{
    public function __construct(UserTarot $model)
    {
        parent::__construct($model);
    }
}
