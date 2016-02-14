<?php

namespace App\Obsan\Entities;

class Intervened extends Model
{
    protected $table = 'intervened';

    protected $fillable = [
        'name',
        'document_type',
        'document',
        'email',
        'pupilage',
        'address',
        'phone'
    ];

    public function interventions()
    {
        return $this->belongsToMany(
            Intervention::getNamespace(),
            'intervened_intervention',
            'intervened_id',
            'interventions_id'
        );
    }
}
