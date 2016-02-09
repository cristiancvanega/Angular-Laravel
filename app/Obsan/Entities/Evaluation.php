<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    protected $fillable =[
        'intervention_id',
        'user_id',
        'date',
        'descripcion_evidencia',
        'impacto',
        'estado_inicial',
        'estado_final',
        'description',
        'recomendaciones'
    ];

    public function intervention()
    {
        $this->belongsTo('interventions', 'municipality_id');
    }

    public function user()
    {
        return $this->belongsTo('users', 'id', 'user_id');
    }
}
