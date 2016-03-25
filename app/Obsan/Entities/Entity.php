<?php

namespace App\Obsan\Entities;

class Entity extends Model
{
    protected $table = 'entities';

    protected $fillable =[
        'name',
        'email',
        'phone'
    ];

    public function interventions()
    {
        return $this->hasMany(
            Intervention::getNamespace()
        );
    }
}
