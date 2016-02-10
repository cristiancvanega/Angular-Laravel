<?php

namespace App\Http\Controllers;

use App\Obsan\Repositories\BaseRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as MainController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \Request, \Response;
use App\Http\Requests\Request as Requestr;


use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserDeleteRequest;

abstract class Controller extends MainController
{
	protected $repository;

	public function __construct(BaseRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
     * @return mixed
     */
	public function all()
	{
		$collection = $this->repository->model->all();
		return response()->json($collection, 200);
	}

	public function find($id)
	{
		$m = $this->repository->model->find($id);
		if(is_null($m))
			return $this->responseBadRequest('repository does not exist');
		return response()->json($m, 200);
	}

	public function delete($id)
	{
		$m = $this->repository->model->find($id);
		if(is_null($m))
			return $this->responseBadRequest('repository does not exist');
		return response()->json($m->delete(), 202);
	}

    /**
     * @param $data
     * @return mixed
     */
    protected function responseEntityStore($data)
    {
        return Response::json($data,201);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function responseObject($data)
    {
        return Response::json($data,200);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function responseBadRequest($data)
    {
        return Response::json($data, 400);
    }
}
