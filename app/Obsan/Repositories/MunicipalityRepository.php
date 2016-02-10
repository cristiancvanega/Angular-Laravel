<?php
/**
 * Created by PhpStorm.
 * User: cristiancvanega
 * Date: 2/10/16
 * Time: 1:36 AM
 */

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Municipality;

class MunicipalityRepository extends BaseRepository
{
    public function __construct(Municipality $municipality)
    {
        parent::__construct($municipality);
    }
}