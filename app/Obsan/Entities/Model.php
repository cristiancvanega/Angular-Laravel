<?php

namespace App\Obsan\Entities;
use Illuminate\Database\Eloquent\Model as MainModel;


class Model extends MainModel
{
    public static function getNamespace()
    {
        return static::class;
    }
}