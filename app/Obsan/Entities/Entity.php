<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entities';

    protected $fillable =['name'];

    public function interventions()
    {
        return $this->hasMany('interventions');
    }
    
}
