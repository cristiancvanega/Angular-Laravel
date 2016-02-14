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

    public function getCustomReport(Array $request)
    {
        return $this->buildQuery($this->model, $request)->get();
    }

    private function buildQuery(Model $model, Array $fields)
    {
        foreach (array_keys($fields) as $field)
        {
            $model = $model->orWhere($field, 'LIKE', '%' . $fields[$field] . '%');
        }
        return $model;
    }
}