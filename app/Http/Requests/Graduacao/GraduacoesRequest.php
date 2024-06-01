<?php

namespace App\Http\Requests\Graduacao;

use App\Http\Requests\BaseDataRequest;

class GraduacoesRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'graduacoes';
        $joined = [
            'aluno' => 'pessoas',
            'habilitacoes' => 'habilitacoes',
            'trancamentos' => 'trancamentos_graduacao',
            'notas_ingresso' => 'notas_ingresso_graduacao',
        ];

        parent::__construct($primary, $joined);
    }
}
