<?php

namespace App\Http\Controllers;

use App\Obsan\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Obsan\Entities\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(UserCreateRequest $request)
    {
        $request             = $request->toArray();
        $password            = \Hash::make($request['password']);
        $request['password'] = $password;
        return $this->responseEntityStore($this->repository->create($request));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $u = $this->repository->find($id);
        if(is_null($u))
            return response()->json(['User does not exist'], 400);
        return response()->json($u->update($request->toArray()), 202);
    }
}
