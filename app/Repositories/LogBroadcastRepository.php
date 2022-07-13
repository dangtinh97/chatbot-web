<?php

namespace App\Repositories;

use App\Models\LogBroadcast;
use Illuminate\Database\Eloquent\Model;

class LogBroadcastRepository extends BaseRepository
{
    public function __construct(LogBroadcast $model)
    {
        parent::__construct($model);
    }
}
