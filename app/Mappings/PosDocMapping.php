<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class PosDocMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => ['motivo_cancelamento'],
                'HASH' => [],
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
                        'with_table_alias' => 'pesquisas_avancadas.id_projeto',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'situacao_projeto' => [
                "filters" => [
                    [
                        'name' => 'situacao_projeto',
                        'with_table_alias' => 'pesquisas_avancadas.situacao_projeto',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_projeto' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_projeto',
                        'with_table_alias' => 'pesquisas_avancadas.data_inicio_projeto',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_projeto' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_projeto',
                        'with_table_alias' => 'pesquisas_avancadas.data_fim_projeto',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'motivo_cancelamento' => [
                "filters" => [
                    [
                        'name' => 'motivo_cancelamento',
                        'with_table_alias' => 'pesquisas_avancadas.motivo_cancelamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'codigo_departamento' => [
                "filters" => [
                    [
                        'name' => 'codigo_departamento',
                        'with_table_alias' => 'pesquisas_avancadas.codigo_departamento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],

                ]
            ],
            'nome_departamento' => [
                "filters" => [
                    [
                        'name' => 'nome_departamento',
                        'with_table_alias' => 'pesquisas_avancadas.nome_departamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'titulo_projeto' => [
                "filters" => []
            ],
            'area_cnpq' => [
                "filters" => [
                    [
                        'name' => 'area_cnpq',
                        'with_table_alias' => 'pesquisas_avancadas.area_cnpq',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'palavras_chave' => [
                "filters" => []
            ],
        ];
    }
}
