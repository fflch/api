<?php

namespace App\Utilities\RestrictedColumns;

class RestrictedICs
{
    /* [All Columns]
    'id_projeto',
    'numero_usp',
    'nome',
    'situacao_projeto',
    'ano_projeto',
    'codigo_departamento',
    'nome_departamento',
    'numero_usp_orientador',
    'nome_orientador',
    'data_inicio_projeto',
    'data_fim_projeto',
    'titulo_projeto',
    'palavras_chave',
    */

    const publicAccess = [
        'hide' => ['nome', 'nome_orientador'],
        'hash' => ['numero_usp', 'numero_usp_orientador'],
    ];

    const privateAccess = [
        'admin' => [
            'hide' => [],
            'hash' => []
        ],
        'externo' => [
            'hide' => ['nome', 'nome_orientador'],
            'hash' => ['numero_usp', 'numero_usp_orientador'],
        ]
    ];
}
