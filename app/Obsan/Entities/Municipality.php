<?php

namespace App\Obsan\Entities;

class Municipality extends Model
{
    protected $table = 'municipalities';

    protected $fillable =['name'];

    public function interventions()
    {
        $this->hasMany(
            Intervention::getNamespace(),
            'municipality_id'
        );
    }
}
