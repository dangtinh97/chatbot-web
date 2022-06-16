<?php

namespace App\Repositories;

use App\Models\GameScore;
use Illuminate\Database\Eloquent\Model;

class GameScoreRepository extends BaseRepository
{
    public function __construct(GameScore $model)
    {
        parent::__construct($model);
    }
}
