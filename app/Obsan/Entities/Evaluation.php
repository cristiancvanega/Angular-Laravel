<?php

namespace App\Obsan\Entities;

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
        return $this->belongsTo(
            Intervention::getNamespace()
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::getNamespace()
        );
    }
}
