<?php

namespace App\Repositories;

use App\Models\Block;
use Illuminate\Database\Eloquent\Model;

class BlockRepository extends BaseRepository
{
    public function __construct(Block $model)
    {
        parent::__construct($model);
    }
}
