<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Obsan\Entities\Intervention;
use App\Http\Requests\InterventionCreateRequest;
use App\Http\Controllers\Controller;

class InterventionController extends Controller
{
    public function __construct(Intervention $intervention)
    {
        $this->model = $intervention;
    }

    public function create(InterventionCreateRequest $request)
    {
        return $this->responseEntityStore($this->model->create($request->toArray()));
    }

}
