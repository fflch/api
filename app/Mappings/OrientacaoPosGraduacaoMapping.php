<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class OrientacaoPosGraduacaoMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [],
                'HASH' => ['numero_usp_orientador'],
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
            'id_posgraduacao' => [
                "filters" => [
                    [
                        'name' => 'id_posgraduacao',
                        'with_table_alias' => 'orientacoes_posgraduacao.id_posgraduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'numero_usp_orientador' => [
                "filters" => [
                    [
                        'name' => 'numero_usp_orientador',
                        'with_table_alias' => 'orientacoes_posgraduacao.numero_usp_orientador',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'sequencia_orientacao' => [
                "filters" => [
                    [
                        'name' => 'sequencia_orientacao',
                        'with_table_alias' => 'orientacoes_posgraduacao.sequencia_orientacao',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'tipo_orientacao' => [
                "filters" => [
                    [
                        'name' => 'tipo_orientacao',
                        'with_table_alias' => 'orientacoes_posgraduacao.tipo_orientacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_orientacao' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_orientacao',
                        'with_table_alias' => 'orientacoes_posgraduacao.data_inicio_orientacao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ],
            ],
            'data_fim_orientacao' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_orientacao',
                        'with_table_alias' => 'orientacoes_posgraduacao.data_fim_orientacao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'ultimo_orientador' => [
                "filters" => [
                    [
                        'name' => 'ultimo_orientador',
                        'with_table_alias' => 'orientacoes_posgraduacao.ultimo_orientador',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'orientacao_especifica' => [
                "filters" => [
                    [
                        'name' => 'orientacao_especifica',
                        'with_table_alias' => 'orientacoes_posgraduacao.orientacao_especifica',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_conversao_para_plena' => [
                "filters" => [
                    [
                        'name' => 'ano_conversao_para_plena',
                        'with_table_alias' => 'orientacoes_posgraduacao.data_conversao_para_plena',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_conversao_para_especifica' => [
                "filters" => [
                    [
                        'name' => 'ano_conversao_para_especifica',
                        'with_table_alias' => 'orientacoes_posgraduacao.data_conversao_para_especifica',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
        ];
    }
}
