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
        $response = $this->repository->getCustomReport($request->toArray());
        $this->generatePDF($response, 'CustomReportIntervened.pdf', 'intervened.customReport', 'intervened');
        return response()->json($response);
    }

    public function all()
    {
        $collection = $this->repository->all();
        $this->generatePDF($collection, 'ReporteIntervenido.pdf', 'intervened.customReport', 'intervened');
        return response()->json($collection, 200);
    }

    public function downloadReport()
    {
        return $this->downloadFile('ReporteIntervenido.pdf');
    }

    public function downloadCustomReport()
    {
        return $this->downloadFile('CustomReportIntervened.pdf');
    }

}
