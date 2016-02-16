<?php

namespace App\Http\Controllers;

use App\Obsan\Repositories\EvaluationRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Obsan\Entities\Evaluation;
use App\Http\Requests\EvaluationCreateRequest;
use App\Http\Requests\EvaluationUpdateRequest;
use App\Http\Requests\EvaluationCustomReportRequest;

class EvaluationController extends Controller
{
    public function __construct(EvaluationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(EvaluationCreateRequest $request)
    {
        return $this->responseEntityStore($this->repository->create($request->toArray()));
    }

    public function update(EvaluationUpdateRequest $request, $id)
    {
        $e = $this->repository->find($id);
        if(is_null($e))
            return response()->json(['Evaluation does not exist'], 400);
        return response()->json($e->update($request->toArray()), 202);
    }

    public function getReportData()
    {
        return response()->json($this->repository->getReportData());
    }

    public function getCustomReport(EvaluationCustomReportRequest $request)
    {
        return response()->json($this->repository->getCustomReport($request->toArray()));
    }

    public function getWithInterventionAndUser()
    {
        return response()->json($this->repository->getWithInterventionAndUser());
    }
}
