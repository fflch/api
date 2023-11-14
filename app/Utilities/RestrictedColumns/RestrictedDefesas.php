<?php

namespace App\Utilities\RestrictedColumns;

class RestrictedDefesas
{
    /* [All Columns]
    'id_defesa',
    'numero_usp',
    'nome',
    'id_posgraduacao',
    'nivel_programa',
    'codigo_area',
    'nome_area',
    'codigo_programa',
    'nome_programa',
    'data_defesa',
    'local_defesa',
    'mencao_honrosa',
    'titulo_trabalho'
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
