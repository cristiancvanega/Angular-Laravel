<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Obsan\Entities\Entity;
use App\Http\Requests\EntityCreateRequest;
use App\Http\Requests\EntityUpdateRequest;


class EntityController extends Controller
{
    public function __construct(Entity $intervened)
    {
        $this->model = $intervened;
    }

    public function create(EntityCreateRequest $request)
    {
        return $this->responseEntityStore($this->model->create($request->toArray()));
    }

    public function update(EntityUpdateRequest $request, $id)
    {
        $u = $this->model->find($id);
        if(is_null($u))
            return response()->json(['Entity does not exist'], 400);
        return response()->json($u->update($request->toArray()), 202);
    }
}
