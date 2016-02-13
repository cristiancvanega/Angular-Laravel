<?php

namespace App\Http\Controllers;

use App\Obsan\Repositories\IntervenedRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Obsan\Entities\Intervened;
use App\Http\Requests\IntervenedCreateRequest;
use App\Http\Requests\IntervenedUpdateRequest;
use App\Http\Requests\IntervenedCustomReportRequest;

class IntervenedController extends Controller
{
    public function __construct(IntervenedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(IntervenedCreateRequest $request)
    {
        return $this->responseEntityStore($this->repository->create($request->toArray()));
    }

    public function update(IntervenedUpdateRequest $request, $id)
    {
        $u = $this->repository->find($id);
        if(is_null($u))
            return response()->json(['Intervened does not exist'], 400);
        return response()->json($u->update($request->toArray()), 202);
    }

    public function getInterventions($id)
    {
        $u = $this->repository->getInterventions($id);
        if(is_null($u))
            return response()->json(['Intervened does not exist'], 400);
        return response()->json($u, 202);
    }

    public function getCustomReport(IntervenedCustomReportRequest $request)
    {
        return response()->json($this->repository->getCustomReport($request->toArray()));
    }
}
