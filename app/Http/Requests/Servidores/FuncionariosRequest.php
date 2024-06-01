<?php

namespace App\Http\Requests\Servidores;

use App\Http\Requests\BaseDataRequest;

class FuncionariosRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'funcionarios';
        $joined = [
            'pessoa' => 'pessoas',
            'designacoes' => 'designacoes_servidores'
        ];

        parent::__construct($primary, $joined);
    }
}
