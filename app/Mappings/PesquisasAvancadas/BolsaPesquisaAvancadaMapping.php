<?php

namespace App\Mappings\PesquisasAvancadas;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class BolsaPesquisaAvancadaMapping extends AbstractMapping
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
            'sequencia_periodo' => [
                "filters" => [
                    [
                        'name' => 'sequencia_periodo',
                        'with_table_alias' => 'bolsas_pesq_avancada.sequencia_periodo',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'sequencia_fomento' => [
                "filters" => [
                    [
                        'name' => 'sequencia_fomento',
                        'with_table_alias' => 'bolsas_pesq_avancada.sequencia_fomento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'codigo_fomento' => [
                "filters" => [
                    [
                        'name' => 'codigo_fomento',
                        'with_table_alias' => 'bolsas_pesq_avancada.codigo_fomento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_fomento' => [
                "filters" => [
                    [
                        'name' => 'nome_fomento',
                        'with_table_alias' => 'bolsas_pesq_avancada.nome_fomento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_fomento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_fomento',
                        'with_table_alias' => 'bolsas_pesq_avancada.data_inicio_fomento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_fomento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_fomento',
                        'with_table_alias' => 'bolsas_pesq_avancada.data_fim_fomento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'id_fomento' => [
                "filters" => [
                    [
                        'name' => 'id_fomento',
                        'with_table_alias' => 'supervisoes_pesq_avancada.id_fomento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
