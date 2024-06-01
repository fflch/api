<?php

namespace App\Mappings\PosGraduacao;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class PosGraduacaoMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [],
                'HASH' => ['numero_usp'],
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
                        'with_table_alias' => 'posgraduacoes.id_posgraduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'numero_usp' => [
                "filters" => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'posgraduacoes.numero_usp',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'seq_programa' => [
                "filters" => [
                    [
                        'name' => 'seq_programa',
                        'with_table_alias' => 'posgraduacoes.seq_programa',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'tipo_matricula' => [
                "filters" => [
                    [
                        'name' => 'tipo_matricula',
                        'with_table_alias' => 'posgraduacoes.tipo_matricula',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'nivel_programa' => [
                "filters" => [
                    [
                        'name' => 'nivel_programa',
                        'with_table_alias' => 'posgraduacoes.nivel_programa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_area' => [
                "filters" => [
                    [
                        'name' => 'codigo_area',
                        'with_table_alias' => 'posgraduacoes.codigo_area',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ],
            ],
            'nome_area' => [
                "filters" => [
                    [
                        'name' => 'nome_area',
                        'with_table_alias' => 'posgraduacoes.nome_area',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_programa' => [
                "filters" => [
                    [
                        'name' => 'codigo_programa',
                        'with_table_alias' => 'posgraduacoes.codigo_programa',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_programa' => [
                "filters" => [
                    [
                        'name' => 'nome_programa',
                        'with_table_alias' => 'posgraduacoes.nome_programa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_selecao' => [
                "filters" => [
                    [
                        'name' => 'ano_selecao',
                        'with_table_alias' => 'posgraduacoes.data_selecao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'primeira_matricula' => [ // ver: "data_primeira_matricula"
                "filters" => [
                    [
                        'name' => 'ano_primeira_matricula',
                        'with_table_alias' => 'posgraduacoes.primeira_matricula',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'tipo_ultima_ocorrencia' => [
                "filters" => [
                    [
                        'name' => 'tipo_ultima_ocorrencia',
                        'with_table_alias' => 'posgraduacoes.tipo_ultima_ocorrencia',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_ultima_ocorrencia' => [
                "filters" => [
                    [
                        'name' => 'ano_ultima_ocorrencia',
                        'with_table_alias' => 'posgraduacoes.data_ultima_ocorrencia',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_deposito_trabalho' => [
                "filters" => [
                    [
                        'name' => 'ano_deposito_trabalho',
                        'with_table_alias' => 'posgraduacoes.data_deposito_trabalho',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_aprovacao_trabalho' => [
                "filters" => [
                    [
                        'name' => 'ano_aprovacao_trabalho',
                        'with_table_alias' => 'posgraduacoes.data_aprovacao_trabalho',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
        ];
    }
}
