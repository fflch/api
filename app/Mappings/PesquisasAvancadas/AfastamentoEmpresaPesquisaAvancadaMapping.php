<?php

namespace App\Mappings\PesquisasAvancadas;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class AfastamentoEmpresaPesquisaAvancadaMapping extends AbstractMapping
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
                        'with_table_alias' => 'afastempresas_pesq_avancada.sequencia_periodo',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'seq_vinculo_empresa' => [
                "filters" => [
                    [
                        'name' => 'seq_vinculo_empresa',
                        'with_table_alias' => 'afastempresas_pesq_avancada.seq_vinculo_empresa',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_empresa' => [
                "filters" => [
                    [
                        'name' => 'nome_empresa',
                        'with_table_alias' => 'afastempresas_pesq_avancada.nome_empresa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_afastamento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_afastamento',
                        'with_table_alias' => 'afastempresas_pesq_avancada.data_inicio_afastamento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_afastamento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_afastamento',
                        'with_table_alias' => 'afastempresas_pesq_avancada.data_fim_afastamento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'tipo_vinculo' => [
                "filters" => [
                    [
                        'name' => 'tipo_vinculo',
                        'with_table_alias' => 'supervisoes_pesq_avancada.tipo_vinculo',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
