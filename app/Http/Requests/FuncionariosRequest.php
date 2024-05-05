<?php

namespace App\Http\Requests;

class FuncionariosRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'funcionarios';
        $joined = ['pessoa' => 'pessoas'];

        parent::__construct($primary, $joined);
    }
}
