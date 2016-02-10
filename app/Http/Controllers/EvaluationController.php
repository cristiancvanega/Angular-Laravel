<?php

namespace App\Http\Controllers;

use App\Obsan\Repositories\EvaluationRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Obsan\Entities\Evaluation;
use App\Http\Requests\EvaluationCreateRequest;
use App\Http\Requests\EvaluationUpdateRequest;

class EvaluationController extends Controller
{
    public function __construct(EvaluationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(EvaluationCreateRequest $request)
    {
        return $this->responseEntityStore($this->repository->model->create($request->toArray()));
    }

    public function update(EvaluationUpdateRequest $request, $id)
    {
        $u = $this->repository->model->find($id);
        if(is_null($u))
            return response()->json(['Evaluation does not exist'], 400);
        return response()->json($u->update($request->toArray()), 202);
    }
}
