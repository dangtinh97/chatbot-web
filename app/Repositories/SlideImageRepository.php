<?php

namespace App\Repositories;

use App\Models\SlideImage;
use Illuminate\Database\Eloquent\Model;

class SlideImageRepository extends BaseRepository
{
    public function __construct(SlideImage $model)
    {
        parent::__construct($model);
    }
}
