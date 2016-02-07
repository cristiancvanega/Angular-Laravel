<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

abstract class Request extends FormRequest
{
    public function response(array $errors)
    {
        if(count($errors) > 0)
        {
            return response()->json($errors, 400);
        }
    }
}
