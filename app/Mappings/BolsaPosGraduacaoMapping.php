<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class BolsaPosGraduacaoMapping extends AbstractMapping
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
            'id_bolsa' => [
                "filters" => [
                    [
                        'name' => 'id_bolsa',
                        'with_table_alias' => 'bolsas_posgraduacao.id_bolsa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'id_posgraduacao' => [
                "filters" => [
                    [
                        'name' => 'id_posgraduacao',
                        'with_table_alias' => 'bolsas_posgraduacao.id_posgraduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'situacao_bolsa' => [
                "filters" => [
                    [
                        'name' => 'situacao_bolsa',
                        'with_table_alias' => 'bolsas_posgraduacao.situacao_bolsa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_bolsa' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_bolsa',
                        'with_table_alias' => 'bolsas_posgraduacao.data_inicio_bolsa',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_bolsa' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_bolsa',
                        'with_table_alias' => 'bolsas_posgraduacao.data_fim_bolsa',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ],
            ],
            'codigo_instituicao_fomento' => [
                "filters" => [
                    [
                        'name' => 'codigo_instituicao_fomento',
                        'with_table_alias' => 'bolsas_posgraduacao.codigo_instituicao_fomento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'sigla_instituicao_fomento' => [
                "filters" => [
                    [
                        'name' => 'sigla_instituicao_fomento',
                        'with_table_alias' => 'bolsas_posgraduacao.sigla_instituicao_fomento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'nome_instituicao_fomento' => [
                "filters" => []
            ],
            'codigo_programa_fomento' => [
                "filters" => [
                    [
                        'name' => 'codigo_programa_fomento',
                        'with_table_alias' => 'bolsas_posgraduacao.codigo_programa_fomento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_programa_fomento' => [
                "filters" => []
            ],
        ];
    }
}
