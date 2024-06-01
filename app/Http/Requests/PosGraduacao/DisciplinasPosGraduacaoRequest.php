<?php

namespace App\Http\Requests\PosGraduacao;

use App\Http\Requests\BaseDataRequest;

class DisciplinasPosGraduacaoRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'disciplinas_posgraduacao';
        $joined = [
            'turmas' => 'turmas_posgraduacao',
        ];

        parent::__construct($primary, $joined);
    }
}
