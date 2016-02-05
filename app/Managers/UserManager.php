<?php

namespace App\Managers;

use App\Entities\User;

class UserManager extends BaseManager
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function update()
    {
        // TODO: Implement update() method.
    }
}