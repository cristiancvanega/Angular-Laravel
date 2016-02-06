<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municiplities';

    protected $fillable =['name'];

    public function interventions()
    {
        $this->hasMany('interventions', 'municipality_id');
    }
}
