<?php

namespace App\Obsan\Repositories;


use App\Obsan\Entities\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

}