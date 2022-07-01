<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
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

    /**
     * @param array $cond
     * @param array $option
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findFistWithOption(array $cond,array $options):?Model
    {
        $query = $this->model::query();
        $query->where($cond);
        if(in_array(Arr::get($options,'sort',''),['DESC','ASC'])){
            if(Arr::get($options,'sort')==="DESC"){
                $query->orderBy(Arr::get($options,'column_sort','id'),Arr::get($options,'sort',''));
            }
        }

        /** @params options
        [
        'sort' => "DESC",
        'column_sort' => "score"
        ]*/
        return $query->first();
    }

    /**
     * @param array $cond
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function firstOrCreate(array $cond, array $data)
    {
        return $this->model::query()->firstOrCreate($cond, $data);
    }

    /**
     * @param array $data
     *
     * @return boolean
     */
    public function insert(array $data)
    {
        return $this->model::query()->insert($data);
    }

    /**
     * @param string $column
     * @param array  $data
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function whereIn(string $column,array $data)
    {
        return $this->model::query()->whereIn($column,$data)->get();
    }
}
