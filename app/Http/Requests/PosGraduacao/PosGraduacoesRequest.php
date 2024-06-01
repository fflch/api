<?php

namespace App\Http\Requests\PosGraduacao;

use App\Http\Requests\BaseDataRequest;

class PosGraduacoesRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'posgraduacoes';
        $joined = [
            'aluno' => 'pessoas',
            'orientacoes' => 'orientacoes_posgraduacao',
            'convenios' => 'convenios_posgraduacoes',
            'exame_proficiencia' => 'proficiencia_idiomas_pg',
            'bolsas' => 'bolsas_posgraduacao',
            'ocorrencias' => 'ocorrencias_posgraduacao',
            'defesa' => 'defesas_posgraduacao',
        ];

        parent::__construct($primary, $joined);
    }
}
