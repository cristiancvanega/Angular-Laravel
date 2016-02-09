<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Obsan\Entities\Intervened;

class IntervenedController extends Controller
{
    public function __construct(Intervened $intervened)
    {
        $this->model = $intervened;
    }
}
