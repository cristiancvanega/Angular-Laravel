<?php

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Intervened;

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
}