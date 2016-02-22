<?php

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Entity;

class EntityRepository extends BaseRepository
{
    public function __construct(Entity $entity)
    {
        parent::__construct($entity);
    }
}