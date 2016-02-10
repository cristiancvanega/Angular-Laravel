<?php
namespace App\Obsan\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}