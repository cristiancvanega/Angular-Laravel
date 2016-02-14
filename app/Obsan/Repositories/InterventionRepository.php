<?php
namespace App\Obsan\Repositories;


use App\Obsan\Entities\Entity;
use App\Obsan\Entities\IntervenedIntervention;
use App\Obsan\Entities\Intervention;

class InterventionRepository extends BaseRepository
{
    protected $intervenedIntervention;

    public function __construct(Intervention $intervention, IntervenedIntervention $intervenedIntervention)
    {
        parent::__construct($intervention);
        $this->intervenedIntervention = $intervenedIntervention;
    }

    public function create($array)
    {
        $i = $this->model->create($array);
        $this->intervenedIntervention->create(['interventions_id' => $i->id, 'intervened_id' => $array['intervened_id']]);
        return $i;
    }

    public function getData()
    {
        $entidad = Entity::Join('interventions', 'entities.id', '=', 'interventions.entity_id')
            ->Join('municipalities', 'interventions.municipality_id', '=', 'municipalities.id' )
            ->select('entities.name as entity', 'municipalities.name as municipality', 'interventions.address',
                'interventions.name', 'interventions.start_date',
                'interventions.end_date', 'interventions.description', 'interventions.id')
            ->get();
        return $entidad;
    }

    public function getIntervened($id)
    {
        return $this->model->with(
            'intervened'
        )->find($id);
    }

    public function getEvaluation($id)
    {
        return $this->model->with([
            'evaluations',
            'evaluations.user',
        ])->find($id);
    }

    public function getWithEntitiesAndMunicipalities()
    {
        return $this->model->with(
            'municipality',
            'entity'
        )->get();
    }
}