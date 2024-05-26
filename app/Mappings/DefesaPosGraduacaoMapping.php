<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class DefesaPosGraduacaoMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [],
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
            'id_defesa' => [
                "filters" => [
                    [
                        'name' => 'id_defesa',
                        'with_table_alias' => 'defesas_posgraduacao.id_defesa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'id_posgraduacao' => [
                "filters" => [
                    [
                        'name' => 'id_posgraduacao',
                        'with_table_alias' => 'defesas_posgraduacao.id_posgraduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_defesa' => [
                "filters" => [
                    [
                        'name' => 'ano_defesa',
                        'with_table_alias' => 'defesas_posgraduacao.data_defesa',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'local_defesa' => [
                "filters" => []
            ],
            'mencao_honrosa' => [
                "filters" => [
                    [
                        'name' => 'mencao_honrosa',
                        'with_table_alias' => 'defesas_posgraduacao.mencao_honrosa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'titulo_trabalho' => [
                "filters" => []
            ],
        ];
    }
}
