<?php

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Intervened;
use App\Obsan\Entities\Intervention;
use Carbon\Carbon;

class IntervenedRepository extends BaseRepository
{
    public function __construct(Intervened $intervened)
    {
        parent::__construct($intervened);
    }

    public function getInterventions($id)
    {
        return $this->model->with([
            'interventions',
            'interventions.municipality',
            'interventions.entity'
        ])->find($id);
    }

    public function getCustomReportI($intervention_id)
    {
        return (new intervention)->with('intervened')->find($intervention_id['intervention_id'])->toArray()['intervened'];
    }
}