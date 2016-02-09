<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Obsan\Entities\Municipality;
use App\Http\Requests\MunicipalityCreateRequest;
use App\Http\Requests\MunicipalityUpdateRequest;

class MunicipalityController extends Controller
{
    public function __construct(Municipality $municipality)
    {
        $this->model = $municipality;
    }

    public function create(MunicipalityCreateRequest $request)
    {
        return $this->responseEntityStore($this->model->create($request->toArray()));
    }

    public function update(MunicipalityUpdateRequest $request, $id)
    {
        $u = $this->model->find($id);
        if(is_null($u))
            return response()->json(['User does not exist'], 400);
        return response()->json($u->update($request->toArray()), 202);
    }
}
