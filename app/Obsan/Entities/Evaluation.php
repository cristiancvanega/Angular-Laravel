<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    protected $fillable =[];

    public function intervention()
    {
        $this->belongsTo('interventions', 'municipality_id');
    }

    public function user()
    {
        return $this->belongsTo('users', 'id', 'user_id');
    }
}
