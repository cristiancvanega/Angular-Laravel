<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';

    protected $fillable =['name'];

    public function interventions()
    {
        $this->hasMany('interventions', 'municipality_id');
    }
}
