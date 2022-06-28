<?php

namespace App\Repositories;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;

class AttachmentRepository extends BaseRepository
{
    public function __construct(Attachment $model)
    {
        parent::__construct($model);
    }
}
