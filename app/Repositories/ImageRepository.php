<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class ImageRepository extends BaseRepository
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }
}
