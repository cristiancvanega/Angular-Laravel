<?php
namespace App\Obsan\Repositories;

use App\Obsan\Entities\Entity;
use App\Obsan\Entities\IntervenedIntervention;
use App\Obsan\Entities\Intervention;
use App\Obsan\Entities\Municipality;
use Carbon\Carbon;

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
            ->select('entities.name as entity', 'municipalities.name as municipality',
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
            'evaluations.intervention'
        ])->find($id);
    }

    public function getWithEntitiesAndMunicipalities()
    {
        return $this->model->with(
            'municipality',
            'entity'
        )->get();
    }

    public function getFieldsCustomReport()
    {
        $municipalities = (new MunicipalityRepository(new Municipality()))->getIdNames();
        $entities = (new EntityRepository(new Entity()))->getIdNames();
        return [
            'municipalities'=> $municipalities,
            'entities'      => $entities,
            'interventions'  => $this->model->all('id', 'name')
        ];
    }

    public function getCustomReportI(Array $request)
    {
        if(isset($request['forDate']))
        {
            if(isset($request['end_date']))
                return $this->model->where('start_date', '>=', Carbon::parse($request['date']))
                                   ->where('start_date', '<=', Carbon::parse($request['end_date']));

            if($request['forDate'] == 2)
                return $this->model->where('start_date', 'LIKE', Carbon::parse($request['date'])->year . '%');
        }

        return $this->buildQueryI($this->model, $request);
    }

    public function buildQueryI(Intervention $model, Array $fields)
    {
        foreach (array_keys($fields) as $field)
        {
            if($field != 'forDate' && $field != 'end_date')
            {
                if($field === 'date')
                    $model = $model->where('start_date', Carbon::parse($fields[$field]));
                else
                    $model = $model->where($field, $fields[$field]);
            }
        }
        return $model;
    }
}