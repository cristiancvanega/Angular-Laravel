<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class Intervened extends Model
{
    protected $table = 'intervened';

    public function intervened_intervention()
    {
        return $this->belongsToMany('interventions', 'intervened_intervention');
    }
}
