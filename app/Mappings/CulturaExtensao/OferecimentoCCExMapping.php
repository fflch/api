<?php

namespace App\Mappings\CulturaExtensao;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class OferecimentoCCExMapping extends AbstractMapping
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
            'codigo_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'codigo_oferecimento',
                        'with_table_alias' => 'oferecimentos_ccex.codigo_oferecimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_curso_ceu' => [
                "filters" => [
                    [
                        'name' => 'codigo_curso_ceu',
                        'with_table_alias' => 'oferecimentos_ccex.codigo_curso_ceu',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'situacao_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'situacao_oferecimento',
                        'with_table_alias' => 'oferecimentos_ccex.situacao_oferecimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_oferecimento',
                        'with_table_alias' => 'oferecimentos_ccex.data_inicio_oferecimento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_oferecimento',
                        'with_table_alias' => 'oferecimentos_ccex.data_fim_oferecimento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'total_carga_horaria' => [
                "filters" => [
                    [
                        'name' => 'total_carga_horaria',
                        'with_table_alias' => 'oferecimentos_ccex.total_carga_horaria',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'qntd_vagas_ofertadas' => [
                "filters" => [
                    [
                        'name' => 'qntd_vagas_ofertadas',
                        'with_table_alias' => 'oferecimentos_ccex.qntd_vagas_ofertadas',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'curso_pago' => [
                "filters" => [
                    [
                        'name' => 'curso_pago',
                        'with_table_alias' => 'oferecimentos_ccex.curso_pago',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'valor_inscricao_edicao' => [
                "filters" => [
                    [
                        'name' => 'valor_inscricao_edicao',
                        'with_table_alias' => 'oferecimentos_ccex.valor_inscricao_edicao',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'qntd_vagas_gratuitas' => [
                "filters" => [
                    [
                        'name' => 'qntd_vagas_gratuitas',
                        'with_table_alias' => 'oferecimentos_ccex.qntd_vagas_gratuitas',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'valor_previsto_arrecadacao' => [
                "filters" => [
                    [
                        'name' => 'valor_previsto_arrecadacao',
                        'with_table_alias' => 'oferecimentos_ccex.valor_previsto_arrecadacao',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'valor_previsto_custos' => [
                "filters" => [
                    [
                        'name' => 'valor_previsto_custos',
                        'with_table_alias' => 'oferecimentos_ccex.valor_previsto_custos',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'valor_previsto_prce' => [
                "filters" => [
                    [
                        'name' => 'valor_previsto_prce',
                        'with_table_alias' => 'oferecimentos_ccex.valor_previsto_prce',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'curso_para_empresas' => [
                "filters" => [
                    [
                        'name' => 'curso_para_empresas',
                        'with_table_alias' => 'oferecimentos_ccex.curso_para_empresas',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'local_curso' => [
                "filters" => []
            ],
            'data_inicio_inscricoes' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_inscricoes',
                        'with_table_alias' => 'oferecimentos_ccex.data_inicio_inscricoes',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_inscricoes' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_inscricoes',
                        'with_table_alias' => 'oferecimentos_ccex.data_fim_inscricoes',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'permite_inscricao_online' => [
                "filters" => [
                    [
                        'name' => 'permite_inscricao_online',
                        'with_table_alias' => 'oferecimentos_ccex.permite_inscricao_online',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
