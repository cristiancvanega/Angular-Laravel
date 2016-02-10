<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class  Intervention extends Model
{
    protected $table = 'interventions';

    protected $fillable =[
        'entity_id', 'municipality_id', 'name', 'start_date',
        'end_date', 'address', 'description', 'diversidad_dieta_inicio',
        'diversidad_dieta_fin', 'variedad_dieta_inicio', 'variedad_dieta_fin',
        'inseguridad_alimentaria_inicio', 'inseguridad_alimentaria_fin'
    ];

    public function entities()
    {
        return $this->belongsTo('entities', 'id', 'entity_id');
    }

    public function intervened_intervention()
    {
        return $this->belongsToMany('intervened', 'intervened_intervention');
    }

    public function municipality()
    {
        $this->belongsTo('municipalities');
    }

    public function evaluations()
    {
        return $this->hasMany('evaluations');
    }
}
