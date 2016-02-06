<?php

namespace App\Obsan\Entities;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $table = 'interventions';
    protected $fillable =['name','document','document_type','data','pupilage'];
}
