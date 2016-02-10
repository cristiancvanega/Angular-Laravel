<?php
/**
 * Created by PhpStorm.
 * User: cristiancvanega
 * Date: 2/10/16
 * Time: 1:34 AM
 */

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Entity;

class EntityRepository extends BaseRepository
{
    public function __construct(Entity $entity)
    {
        parent::__construct($entity);
    }
}