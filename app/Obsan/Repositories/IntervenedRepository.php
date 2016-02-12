<?php
/**
 * Created by PhpStorm.
 * User: cristiancvanega
 * Date: 2/10/16
 * Time: 1:35 AM
 */

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Intervened;

class IntervenedRepository extends BaseRepository
{
    public function __construct(Intervened $intervened)
    {
        parent::__construct($intervened);
    }

    public function getInterventions($id)
    {
        return $this->model->with(['interventions'])->find($id);
    }
}