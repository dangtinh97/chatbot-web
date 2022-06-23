<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminRepository extends BaseRepository
{
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }
}
