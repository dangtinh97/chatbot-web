<?php

namespace App\Services\Admin;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\SetupAppRepository;

class SetupAppService
{

    protected SetupAppRepository $setupAppRepository;
    public function __construct(SetupAppRepository $setupAppRepository)
    {
        $this->setupAppRepository = $setupAppRepository;
    }

    public function store($param):ApiResponse
    {
        $create = $this->setupAppRepository->query()->updateOrCreate([
            'type' => $param['type']
        ],$param);
        return new ResponseSuccess();
    }
}
