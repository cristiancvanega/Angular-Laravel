<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Obsan\Entities\Intervention;
use App\Http\Requests\InterventionCreateRequest;
use App\Http\Requests\InterventionUpdateRequest;
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

    public function update(InterventionUpdateRequest $request)
    {
        //dd($request->toArray());
        $i = $this->model->find($request->id);
        if(is_null($i))
            return response()->json(['Intervention does not exist'], 400);
        return response()->json($i->update($request->toArray()), 202);
    }
}
