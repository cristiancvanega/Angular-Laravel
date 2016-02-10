<?php
/**
 * Created by PhpStorm.
 * User: cristiancvanega
 * Date: 2/10/16
 * Time: 1:35 AM
 */

namespace App\Obsan\Repositories;


use App\Obsan\Entities\Evaluation;

class EvaluationRepository extends BaseRepository
{
    public function __construct(Evaluation $evaluation)
    {
        parent::__construct($evaluation);
    }
}