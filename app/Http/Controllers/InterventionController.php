<?php

namespace App\Http\Controllers;

use App\Obsan\Repositories\InterventionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Obsan\Entities\Intervention;
use App\Http\Requests\InterventionCreateRequest;
use App\Http\Requests\InterventionUpdateRequest;
use App\Http\Requests\InterventionCustomReportRequest;
use App\Http\Controllers\Controller;

class InterventionController extends Controller
{
    public function __construct(InterventionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(InterventionCreateRequest $request)
    {
        return $this->responseEntityStore($this->repository->create($request->toArray()));
    }

    public function update(InterventionUpdateRequest $request, $id)
    {
        $i = $this->repository->find($id);
        if(is_null($i))
            return response()->json(['Intervention does not exist'], 400);
        return response()->json($i->update($request->toArray()), 202);
    }

    public function getData()
    {
        $response = $this->repository->getCustomReport([])
            ->with([
                'entity',
                'municipality'
            ])
            ->get();
        $this->generatePDF($response, 'ReporteIntervencion.pdf', 'intervention.reportIntervention', 'intervention');
        return response()->json($response);
    }

    public function getIntervened($id)
    {
        $i = $this->repository->getIntervened($id);
        if(is_null($i))
            return response()->json(['Intervention does not exist'], 400);
        return response()->json($i, 202);
    }

    public function getEvaluation($id)
    {
        $e = $this->repository->getEvaluation($id);
        if(is_null($e))
            return response()->json(['Intervention does not exist'], 400);
        return response()->json($e, 202);
    }

    public function getWithEntitiesAndMunicipalities()
    {
        return response()->json($this->repository->getWithEntitiesAndMunicipalities(), 200);
    }

    public function getCustomReport(InterventionCustomReportRequest $request)
    {
        $response = $this->repository
            ->getCustomReportI($request->toArray())
            ->with([
                'entity',
                'municipality'
            ])->get();
        $this->generatePDF($response, 'ReportePerzonalizadoIntervencion.pdf', 'intervention.reportIntervention', 'intervention');
        return response()->json($response);
    }

    public function getFieldsCustomReport()
    {
        return response()->json($this->repository->getFieldsCustomReport());
    }

    public function downloadCustomReport()
    {
        return $this->downloadFile('ReportePerzonalizadoIntervencion.pdf');
    }

    public function downloadReport()
    {
        return $this->downloadFile('ReporteIntervencion.pdf');
    }
}
