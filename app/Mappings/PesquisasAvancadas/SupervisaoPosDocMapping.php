<?php

namespace App\Mappings\PesquisasAvancadas;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class SupervisaoPosDocMapping extends AbstractMapping
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
            'sequencia_supervisao' => [
                "filters" => [
                    [
                        'name' => 'sequencia_supervisao',
                        'with_table_alias' => 'supervisoes_pesq_avancada.sequencia_supervisao',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'tipo_supervisao' => [
                "filters" => [
                    [
                        'name' => 'tipo_supervisao',
                        'with_table_alias' => 'supervisoes_pesq_avancada.tipo_supervisao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_supervisao' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_supervisao',
                        'with_table_alias' => 'pesquisas_avancadas.data_inicio_supervisao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_supervisao' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_supervisao',
                        'with_table_alias' => 'pesquisas_avancadas.data_fim_supervisao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'ultimo_supervisor_resp' => [
                "filters" => [
                    [
                        'name' => 'ultimo_supervisor_resp',
                        'with_table_alias' => 'supervisoes_pesq_avancada.ultimo_supervisor_resp',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
