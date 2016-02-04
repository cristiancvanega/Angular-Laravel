<?php

namespace App/Obsan/Entities;

use Illuminate\Database\Eloquent\Model;

class Intervenido extends Model
{
    protected $table = 'intervenidos';
    protected $fillable =['name','document','document_type','data','school'];
    
}
}
