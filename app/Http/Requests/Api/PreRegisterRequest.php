<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;


class PreRegisterRequest extends BaseRequest
{
    public function __construct(){

        $this->addRule( 'POST' , [
            'nombre' => 'bail|required|string|min:3|max:50',
            'email' => 'bail|required|email|max:50|unique:preregisstro',
            'empresa' => 'bail|required|string|min:3|max:50|unique:preregisstro',
            'telefono' => 'bail|required|string|max:20',
        ]);

    }
}
