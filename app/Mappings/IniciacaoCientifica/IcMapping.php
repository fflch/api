<?php

namespace App\Mappings\IniciacaoCientifica;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class IcMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'nome',
                    'nome_orientador',
                ],
                'HASH' => [
                    'numero_usp',
                    'numero_usp_orientador',
                ],
            ],

            'admin' => [
                'HIDE' => [],
                'HASH' => [],
            ],
        ];
    }

    public static function getColumnsAndFilters()
    {
        return [
            'id_projeto' => [
                "filters" => [
                    [
                        'name' => 'id_projeto',
                        'with_table_alias' => 'iniciacoes.id_projeto',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'situacao_projeto' => [
                "filters" => [
                    [
                        'name' => 'situacao_projeto',
                        'with_table_alias' => 'iniciacoes.situacao_projeto',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'ano_projeto' => [
                "filters" => []
            ],
            'codigo_departamento' => [
                "filters" => [
                    [
                        'name' => 'codigo_departamento',
                        'with_table_alias' => 'iniciacoes.codigo_departamento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_departamento' => [
                "filters" => [
                    [
                        'name' => 'nome_departamento',
                        'with_table_alias' => 'iniciacoes.nome_departamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_projeto' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_projeto',
                        'with_table_alias' => 'iniciacoes.data_inicio_projeto',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_projeto' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_projeto',
                        'with_table_alias' => 'iniciacoes.data_fim_projeto',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'titulo_projeto' => [
                "filters" => []
            ],
            'palavras_chave' => [
                "filters" => []
            ],
        ];
    }
}
