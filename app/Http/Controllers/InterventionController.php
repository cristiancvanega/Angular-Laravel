<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use App\Obsan\Entities\Intervention;

class InterventionController extends Controller
{
    protected $intervention;

    public function __construct(Intervention $intervention)
    {
        $this->intervention = $intervention;
    }

    
}
