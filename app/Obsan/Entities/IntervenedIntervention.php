<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class IntervenedIntervention extends Model
{
    protected $table = 'intervened_intervention';
    protected $fillable =[
        'interventions_id',
        'intervened_id'
    ];

    public function intervened()
    {
        return $this->hasMany(Intervened::getNamespace());
    }

    public function interventions()
    {
        return $this->hasMany(Intervention::getNamespace(), 'id', 'interventions_id');
    }
}
