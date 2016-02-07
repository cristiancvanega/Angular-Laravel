<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Obsan\Entities\User;

class UserController extends BaseController
{

    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;

    }

    public function find($id)
    {
        return $this->user->find($id);
    }
}
