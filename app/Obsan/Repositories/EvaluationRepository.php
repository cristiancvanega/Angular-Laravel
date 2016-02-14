<?php
/**
 * Created by PhpStorm.
 * User: cristiancvanega
 * Date: 2/10/16
 * Time: 1:35 AM
 */

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Evaluation;
use App\Obsan\Entities\Intervention;

class EvaluationRepository extends BaseRepository
{
    public function __construct(Evaluation $evaluation)
    {
        parent::__construct($evaluation);
    }

    public function getData()
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
}