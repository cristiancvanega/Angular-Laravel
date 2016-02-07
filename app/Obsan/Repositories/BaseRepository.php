<?php
/**
 * Created by PhpStorm.
 * User: cristiancvanega
 * Date: 2/6/16
 * Time: 3:03 PM
 */

namespace App\Obsan\Repositories;


abstract class BaseRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
}