<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Obsan\Entities\Evaluation;
use App\Http\Requests\EvaluationCreateRequest;
use App\Http\Requests\EvaluationUpdateRequest;

class EvaluationController extends Controller
{
    public function __construct(Evaluation $evaluation)
    {
        $this->model = $evaluation;
    }

    public function create(EvaluationCreateRequest $request)
    {
        return $this->responseEntityStore($this->model->create($request->toArray()));
    }

    public function update(EvaluationUpdateRequest $request, $id)
    {
        $u = $this->model->find($id);
        if(is_null($u))
            return response()->json(['Evaluation does not exist'], 400);
        return response()->json($u->update($request->toArray()), 202);
    }
}
