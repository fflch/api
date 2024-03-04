<?php

namespace App\Utilities\RestrictedColumns;

class RestrictedFuncionarios
{
    /* [All Columns]
    'id_vinculo',
    'numero_usp',
    'nome',
    'situacao_atual',
    'data_inicio_vinculo',
    'data_fim_vinculo',
    'codigo_ultimo_setor',
    'nome_ultimo_setor',
    'ambito_funcao',
    'classe',
    'referencia',
    'tipo_jornada',
    'tipo_ingresso',
    'data_ultima_alteracao_funcional',
    'ultima_ocorrencia',
    'data_ultima_ocorrencia',
    */

    const publicAccess = [
        'hide' => [
            'nome',
            'data_inicio_vinculo',
            'ultima_ocorrencia',
        ],
        'hash' => ['numero_usp'],
    ];

    const privateAccess = [
        'admin' => [
            'hide' => [],
            'hash' => []
        ],
        'externo' => [
            'hide' => ['nome', 'ultima_ocorrencia'],
            'hash' => ['numero_usp'],
        ]
    ];
}
