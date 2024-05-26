<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class OcorrenciaPosGraduacaoMapping extends AbstractMapping
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
            'id_posgraduacao' => [
                "filters" => [
                    [
                        'name' => 'id_posgraduacao',
                        'with_table_alias' => 'ocorrencias_posgraduacao.id_posgraduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_ocorrencia' => [
                "filters" => [
                    [
                        'name' => 'ano_ocorrencia',
                        'with_table_alias' => 'ocorrencias_posgraduacao.data_ocorrencia',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'tipo_ocorrencia' => [
                "filters" => [
                    [
                        'name' => 'tipo_ocorrencia',
                        'with_table_alias' => 'ocorrencias_posgraduacao.tipo_ocorrencia',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'motivo_ocorrencia' => [
                "filters" => [
                    [
                        'name' => 'motivo_ocorrencia',
                        'with_table_alias' => 'ocorrencias_posgraduacao.motivo_ocorrencia',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'prazo_afastamento' => [
                "filters" => [
                    [
                        'name' => 'prazo_afastamento',
                        'with_table_alias' => 'ocorrencias_posgraduacao.prazo_afastamento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ],
            ],
            'codigo_area_destino' => [
                "filters" => [
                    [
                        'name' => 'codigo_area_destino',
                        'with_table_alias' => 'ocorrencias_posgraduacao.codigo_area_destino',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_area_destino' => [
                "filters" => [
                    [
                        'name' => 'nome_area_destino',
                        'with_table_alias' => 'ocorrencias_posgraduacao.nome_area_destino',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'nivel_programa_destino' => [
                "filters" => [
                    [
                        'name' => 'nivel_programa_destino',
                        'with_table_alias' => 'ocorrencias_posgraduacao.nivel_programa_destino',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'prorrogacao_def_solicitada_dias' => [
                "filters" => [
                    [
                        'name' => 'prorrogacao_def_solicitada_dias',
                        'with_table_alias' => 'ocorrencias_posgraduacao.prorrogacao_def_solicitada_dias',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'prorrogacao_def_obtida_dias' => [
                "filters" => [
                    [
                        'name' => 'prorrogacao_def_obtida_dias',
                        'with_table_alias' => 'ocorrencias_posgraduacao.prorrogacao_def_obtida_dias',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
        ];
    }
}
