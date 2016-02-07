<?php

namespace App\Managers;

abstract class BaseManager
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    abstract function create();

    abstract function update();

    public function find($id)
    {
        return $this->repository->find($id);
    }
}