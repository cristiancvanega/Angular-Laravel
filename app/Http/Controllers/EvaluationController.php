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
        $evaluation = $this->repository->find($id);

        if(is_null($evaluation))
            return response()->json(['Evaluation does not exist'], 400);

        if($evaluation->user_id != $request->get('user_id'))
            return response()->json(['You do not have permission'], 405);

        return response()->json($evaluation->update($request->toArray()), 202);
    }

    public function getReportData()
    {
        $response = $this->repository->getReportData();
        $this->generatePDF($response, 'ReporteEvaluaciones.pdf',
            'evaluation.reportEvaluation',
            'evaluation', 'Reporte de Evaluaciones');
        return response()->json($response);
    }

    public function getCustomReport(EvaluationCustomReportRequest $request)
    {
        $response = $this->repository
            ->getCustomReport($request->toArray())
            ->with([
                'intervention',
                'user'
            ])->get();
        $this->generatePDF($response,
            'ReportePersonalizadoEvaluacion.pdf',
            'evaluation.customReportEvaluation', 'evaluation', 'Reporte Personalizado de Evaluaciones');
        return response()->json($response);
    }

    public function getFieldsCustomReport()
    {
        return response()->json($this->repository->getFieldsCustomReport());
    }

    public function getWithInterventionAndUser()
    {
        return response()->json($this->repository->getWithInterventionAndUser());
    }

    public function downloadCustomReport()
    {
        return response()->download('/tmp/ReportePersonalizadoEvaluacion.pdf');
    }

    public function downloadReport()
    {
        return response()->download('/tmp/ReporteEvaluaciones.pdf');
    }
}
