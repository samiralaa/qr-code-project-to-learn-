<?php

namespace App\Trait;

use Illuminate\Database\Eloquent\Model;

trait Crud
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll($model)
    {
        return $model->all();
    }

    public function getWithRelation($model, $relation, $select)
    {
        return $this->model->with($relation)->select($select)->get();
    }

    public function getById($model, $id)
    {
        return $model->find($id);
    }

    public function getOneByRelation($model, $relation)
    {
        return $this->model->with($relation)->first();
    }

    public function create($model, $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->update($attributes);
            return $model;
        }
        return null;
    }

    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

    public function search($model, $search)
    {
        return $model->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->get();
    }

    public function paginate($model, $perPage)
    {
        return $model->paginate($perPage);
    }

    public function orderBy($model, $column, $order)
    {
        return $model->orderBy($column, $order)->get();
    }

    public function count($model)
    {
        return $model->count();
    }

    public function sum($model, $column)
    {
        return $model->sum($column);
    }


}
