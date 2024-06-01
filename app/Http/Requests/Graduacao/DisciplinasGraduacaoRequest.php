<?php

namespace App\Http\Requests\Graduacao;

use App\Http\Requests\BaseDataRequest;

class DisciplinasGraduacaoRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'disciplinas_graduacao';
        $joined = [
            'turmas' => 'turmas_graduacao',
        ];

        parent::__construct($primary, $joined);
    }
}
