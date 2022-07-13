<?php

namespace App\Repositories;

use App\Models\SetupApp;
use Illuminate\Database\Eloquent\Model;

class SetupAppRepository extends BaseRepository
{
    public function __construct(SetupApp $model)
    {
        parent::__construct($model);
    }
}
