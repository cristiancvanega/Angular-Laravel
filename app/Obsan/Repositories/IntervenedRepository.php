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
        //dd(Carbon::parse($intervention_id['date'])->year);

        if(isset($intervention_id['date']))
        {
            $date = Carbon::parse($intervention_id['date'])->year;
            dd($date);
            return (new Intervention())->with('intervened')
                ->where('start_date', '=', Carbon::parse($intervention_id['date'])->year)->get();
        }

        if(isset($intervention_id['intervention_id']))
             dd($intervention_id['intervention_id']);

        if(isset($intervention_id['date']))
            dd($intervention_id['date']);

        return (new intervention)->with('intervened')->find($intervention_id['intervention_id'])->toArray()['intervened'];
    }
}