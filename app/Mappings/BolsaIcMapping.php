<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class BolsaIcMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'fomento_edital'
                ],
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
                        'with_table_alias' => 'bolsas_ic.id_projeto',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'sequencia_fomento' => [
                "filters" => [
                    [
                        'name' => 'sequencia_fomento',
                        'with_table_alias' => 'bolsas_ic.sequencia_fomento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_fomento' => [
                "filters" => [
                    [
                        'name' => 'nome_fomento',
                        'with_table_alias' => 'bolsas_ic.nome_fomento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'fomento_edital' => [
                "filters" => [
                    [
                        'name' => 'fomento_edital',
                        'with_table_alias' => 'bolsas_ic.fomento_edital',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'data_inicio_fomento' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_fomento',
                        'with_table_alias' => 'bolsas_ic.data_inicio_fomento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ]
                ]
            ],
            'data_fim_fomento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_fomento',
                        'with_table_alias' => 'bolsas_ic.data_fim_fomento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ]
                ]
            ],
        ];
    }
}
