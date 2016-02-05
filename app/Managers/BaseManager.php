<?php

namespace App\Managers;

abstract class BaseManager
{
    protected $model;

    protected $repository;

    abstract function create();

    abstract function update();

    public function find($id)
    {
        return $this->repository->find($id);
    }
}