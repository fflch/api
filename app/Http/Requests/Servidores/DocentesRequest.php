<?php

namespace App\Http\Requests\Servidores;

use App\Http\Requests\BaseDataRequest;

class DocentesRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'docentes';
        $joined = [
            'pessoa' => 'pessoas',
            'designacoes' => 'designacoes_servidores'
        ];

        parent::__construct($primary, $joined);
    }
}
