<?php
namespace App\Obsan\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($array)
    {
        return $this->model->create($array);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getCustomReport(Array $array)
    {
        $query = ['intervention_id' => '2', 'user_id' => '3'];
        \Log::info($array);
        \Log::info($query);
        return $this->model->where($array)->get();
    }
}