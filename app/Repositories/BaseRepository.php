<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository
{
    /** @var \Illuminate\Database\Eloquent\Model  */
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $cond
     *
     * @return \Illuminate\Support\Collection|\Illuminate\Database\Query\Builder[]
     */
    public function find(array $cond)
    {
        return $this->model::query()->where($cond)->get();
    }

    /**
     * @param array $cond
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findFirst(array $cond):?Model
    {
        return $this->model::query()->where($cond)->first();
    }

    /**
     * @param $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($data):Model
    {
        return $this->model::query()->create($data);
    }
}
