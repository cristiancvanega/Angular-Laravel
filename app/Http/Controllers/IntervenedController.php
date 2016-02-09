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

    public function create(IntervenedCreateRequest $request)
    {
        return $this->responseEntityStore($this->model->create($request->toArray()));
    }

    public function update(IntervenedUpdateRequest $request, $id)
    {
        $u = $this->model->find($id);
        if(is_null($u))
            return response()->json(['User does not exist'], 400);
        return response()->json($u->update($request->toArray()), 202);
    }
}
