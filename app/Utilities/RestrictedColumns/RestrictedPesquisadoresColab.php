<?php

namespace App\Utilities\RestrictedColumns;

class RestrictedPesquisadoresColab
{
    /* [All Columns]
    'id_projeto',
    'numero_usp',
    'nome_pesquisador',
    'situacao_projeto',
    'codigo_departamento',
    'nome_departamento',
    'data_inicio_projeto',
    'data_fim_projeto',
    'titulo_projeto',
    'area_cnpq',
    'palavras_chave',
    */

    const publicAccess = [
        'hide' => ['nome_pesquisador', 'nome_supervisor'],
        'hash' => ['numero_usp', 'numero_usp_supervisor'],
    ];

    const privateAccess = [
        'admin' => [
            'hide' => [],
            'hash' => []
        ],
        'comissão' => [
            'hide' => ['nome_pesquisador', 'nome_supervisor'],
            'hash' => []
        ],
        'externo' => [
            'hide' => ['nome_pesquisador', 'nome_supervisor'],
            'hash' => ['numero_usp', 'numero_usp_supervisor'],
        ]
    ];
}
