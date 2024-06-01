<?php

namespace App\Http\Requests\IniciacaoCientifica;

use App\Http\Requests\BaseDataRequest;

class IcsRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'ics';
        $joined = [
            'aluno' => 'pessoas',
            'orientador' => 'pessoas',
            'bolsas' => 'bolsas_ic'
        ];

        parent::__construct($primary, $joined);
    }
}
