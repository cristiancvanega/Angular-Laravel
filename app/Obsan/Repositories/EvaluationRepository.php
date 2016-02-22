<?php

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Evaluation;
use App\Obsan\Entities\IntervenedIntervention;
use App\Obsan\Entities\Intervention;
use App\Obsan\Entities\User;

class EvaluationRepository extends BaseRepository
{
    public function __construct(Evaluation $evaluation)
    {
        parent::__construct($evaluation);
    }

    public function all()
    {
        return $this->model->with([
            'intervention',
            'user'
        ])->get();
    }

    public function getReportData()
    {
        $intervenciones = Intervention::Join('evaluations', 'interventions.id', '=', 'evaluations.intervention_id')
            ->Join('users', 'evaluations.user_id', '=', 'users.id' )
            ->select('interventions.name as intervention', 'users.name as user',
                'evaluations.created_at', 'evaluations.descripcion_evidencia','evaluations.impacto',
                'evaluations.estado_inicial', 'evaluations.estado_final','evaluations.description',
                'evaluations.recomendaciones', 'evaluations.id')->get();
        return $intervenciones;
    }

    public function getWithInterventionAndUser()
    {
        return $this->model->with(
            'intervention',
            'user'
        )->get();
    }

    public function getFieldsCustomReport()
    {
        $users = (new UserRepository(new User()))->getIdEmailAdmins();
        $interventions = (new InterventionRepository(new Intervention(), new IntervenedIntervention()))->getIdNames();
        return [
            'users'         => $users,
            'interventions' => $interventions
        ];
    }
}