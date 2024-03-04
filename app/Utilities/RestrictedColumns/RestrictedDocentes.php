<?php

namespace App\Utilities\RestrictedColumns;

class RestrictedDocentes
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
            'tipo_ingresso'
        ],
        'hash' => ['numero_usp'],
    ];

    const privateAccess = [
        'admin' => [
            'hide' => [],
            'hash' => []
        ],
        'externo' => [
            'hide' => [
                'data_inicio_vinculo',
                'ultima_ocorrencia',
                'tipo_ingresso'
            ],
            'hash' => ['numero_usp'],
        ]
    ];
}
