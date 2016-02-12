<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

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

    public function intervened_intervention()
    {
        return $this->belongsTo('interventions', 'intervened_intervention');
    }
}
