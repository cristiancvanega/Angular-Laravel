<?php
/**
 * Created by PhpStorm.
 * User: cristiancvanega
 * Date: 2/10/16
 * Time: 1:22 AM
 */

namespace App\Obsan\Repositories;


use App\Obsan\Entities\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

}