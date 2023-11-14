<?php

namespace App\Utilities\RestrictedColumns;

class RestrictedEstagiarios
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
    'classe',
    'tipo_jornada',
    'ultima_ocorrencia',
    'data_ultima_ocorrencia',
    */

    const publicAccess = [
        'hide' => ['nome'],
        'hash' => ['numero_usp'],
    ];

    const privateAccess = [
        'admin' => [
            'hide' => [],
            'hash' => []
        ],
        'comissão' => [
            'hide' => ['nome'],
            'hash' => []
        ],
        'externo' => [
            'hide' => ['nome'],
            'hash' => ['numero_usp'],
        ]
    ];
}
