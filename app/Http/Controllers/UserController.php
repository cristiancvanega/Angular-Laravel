<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Obsan\Entities\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserDeleteRequest;

class UserController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        $u = $this->user->all();
        return response()->json($u, 200);
    }

    public function find($id)
    {
        $u = $this->user->find($id);
        if(is_null($u))
            return response()->json(['User does not exist'], 400);
        return response()->json($u, 200);
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
        return response()->json($u->update($request->toArray()), 202);
    }

    public function delete(UserDeleteRequest $request)
    {

        $u = $this->user->find($request->id);
        if(is_null($u))
            return response()->json(['User does not exist'], 400);
        return response()->json($u->delete(), 202);
    }
}
