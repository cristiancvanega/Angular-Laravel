<?php

namespace App\Obsan\Entities;

class  Intervention extends Model
{
    protected $table = 'interventions';

    protected $fillable =[
        'entity_id',
        'municipality_id',
        'name',
        'start_date',
        'end_date',
        'description',
        'evidencias_planeadas'
    ];

    public function entity()
    {
        return $this->belongsTo(
            Entity::getNamespace()
        );
    }

    public function intervened()
    {
        return $this->belongsToMany(
            Intervened::getNamespace(),
            'intervened_intervention',
            'interventions_id',
            'intervened_id'
        );
    }

    public function municipality()
    {
        return $this->belongsTo(
            Municipality::getNamespace()
        );
    }

    public function evaluations()
    {
        return $this->hasMany(
            Evaluation::getNamespace()
        );
    }
}
