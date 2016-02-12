<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class  Intervention extends Model
{
    protected $table = 'interventions';

    protected $fillable =[
        'entity_id',
        'municipality_id',
        'name',
        'start_date',
        'end_date',
        'address',
        'description',
        'evidencias_planeadas'
    ];

    public function entitie()
    {
        return $this->belongsTo(Entity::getNamespace(), 'id', 'entity_id');
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
        $this->belongsTo(Municipality::getNamespace());
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::getNamespace());
    }
}
