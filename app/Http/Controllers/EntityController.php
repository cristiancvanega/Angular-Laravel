<?php

namespace App\Http\Controllers;

use App\Obsan\Repositories\EntityRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EntityCreateRequest;
use App\Http\Requests\EntityUpdateRequest;


class EntityController extends Controller
{
    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(EntityCreateRequest $request)
    {
        return $this->responseEntityStore($this->repository->model->create($request->toArray()));
    }

    public function update(EntityUpdateRequest $request, $id)
    {
        $u = $this->repository->model->find($id);
        if(is_null($u))
            return response()->json(['Entity does not exist'], 400);
        return response()->json($u->update($request->toArray()), 202);
    }
}
