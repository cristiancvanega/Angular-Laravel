<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Obsan\Entities\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\UserCreateRequest;

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
        \Log::info($request);
        return $this->user->create($request->toArray());
    }
}
