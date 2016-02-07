<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Obsan\Entities\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function create(UserCreateRequest $request)
    {
        return $this->user->create($request->toArray());
    }

    public function update(UserUpdateRequest $request)
    {
        $u = $this->user->find($request->id);
        if(is_null($u))
            return response()->json(['User does not exist'], 400);
        //dd($u->update($request->toArray()), 201);
        return response()->json($u->update($request->toArray()), 202);
    }
}
