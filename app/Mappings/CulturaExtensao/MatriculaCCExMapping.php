<?php

namespace App\Mappings\CulturaExtensao;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class MatriculaCCExMapping extends AbstractMapping
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
            'codigo_matricula_ceu' => [
                "filters" => [
                    [
                        'name' => 'codigo_matricula_ceu',
                        'with_table_alias' => 'matriculas_ccex.codigo_matricula_ceu',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'numero_usp' => [
                "filters" => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'matriculas_ccex.numero_usp',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'codigo_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'codigo_oferecimento',
                        'with_table_alias' => 'matriculas_ccex.codigo_oferecimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_matricula' => [
                "filters" => [
                    [
                        'name' => 'ano_matricula',
                        'with_table_alias' => 'matriculas_ccex.data_matricula',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'situacao_matricula' => [
                "filters" => [
                    [
                        'name' => 'situacao_matricula',
                        'with_table_alias' => 'matriculas_ccex.situacao_matricula',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_curso' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_curso',
                        'with_table_alias' => 'matriculas_ccex.data_inicio_curso',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_curso' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_curso',
                        'with_table_alias' => 'matriculas_ccex.data_fim_curso',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'frequencia_aluno' => [
                "filters" => [
                    [
                        'name' => 'frequencia_aluno',
                        'with_table_alias' => 'matriculas_ccex.frequencia_aluno',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'conceito_final_aluno' => [
                "filters" => [
                    [
                        'name' => 'conceito_final_aluno',
                        'with_table_alias' => 'matriculas_ccex.conceito_final_aluno',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
