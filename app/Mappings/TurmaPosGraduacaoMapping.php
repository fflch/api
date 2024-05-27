<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class TurmaPosGraduacaoMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'num_inscritos',
                    'motivo_cancelamento',
                    'frequencia_media',
                    'aprovacao_pct',
                    'reprovacao_pct',
                    'pendencia_pct',
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
            'id_turma' => [
                "filters" => [
                    [
                        'name' => 'id_turma',
                        'with_table_alias' => 'turmas_posgraduacao.id_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_disciplina' => [
                "filters" => [
                    [
                        'name' => 'codigo_disciplina',
                        'with_table_alias' => 'turmas_posgraduacao.codigo_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'versao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'versao_disciplina',
                        'with_table_alias' => 'turmas_posgraduacao.versao_disciplina',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'codigo_turma' => [
                "filters" => [
                    [
                        'name' => 'codigo_turma',
                        'with_table_alias' => 'turmas_posgraduacao.codigo_turma',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'situacao_turma' => [
                "filters" => [
                    [
                        'name' => 'situacao_turma',
                        'with_table_alias' => 'turmas_posgraduacao.situacao_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_turma' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_turma',
                        'with_table_alias' => 'turmas_posgraduacao.data_inicio_turma',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_turma' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_turma',
                        'with_table_alias' => 'turmas_posgraduacao.data_fim_turma',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'vagas_regulares' => [
                "filters" => [
                    [
                        'name' => 'vagas_regulares',
                        'with_table_alias' => 'turmas_posgraduacao.vagas_regulares',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vagas_especiais' => [
                "filters" => [
                    [
                        'name' => 'vagas_especiais',
                        'with_table_alias' => 'turmas_posgraduacao.vagas_especiais',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vagas_total' => [
                "filters" => [
                    [
                        'name' => 'vagas_total',
                        'with_table_alias' => 'turmas_posgraduacao.vagas_total',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'num_inscritos' => [
                "filters" => [
                    [
                        'name' => 'num_inscritos',
                        'with_table_alias' => 'turmas_posgraduacao.num_inscritos',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'num_matriculas_deferidas' => [
                "filters" => [
                    [
                        'name' => 'num_matriculas_deferidas',
                        'with_table_alias' => 'turmas_posgraduacao.num_matriculas_deferidas',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'num_matriculas_indeferidas' => [
                "filters" => [
                    [
                        'name' => 'num_matriculas_indeferidas',
                        'with_table_alias' => 'turmas_posgraduacao.num_matriculas_indeferidas',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'num_matriculas_canceladas' => [
                "filters" => [
                    [
                        'name' => 'num_matriculas_canceladas',
                        'with_table_alias' => 'turmas_posgraduacao.num_matriculas_canceladas',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'consolidacao_turma' => [
                "filters" => [
                    [
                        'name' => 'consolidacao_turma',
                        'with_table_alias' => 'turmas_posgraduacao.consolidacao_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'consolidacao_resultados' => [
                "filters" => [
                    [
                        'name' => 'consolidacao_resultados',
                        'with_table_alias' => 'turmas_posgraduacao.consolidacao_resultados',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_cancelamento' => [
                "filters" => [
                    [
                        'name' => 'ano_cancelamento',
                        'with_table_alias' => 'turmas_posgraduacao.data_cancelamento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'motivo_cancelamento' => [
                "filters" => []
            ],
            'frequencia_media' => [
                "filters" => [
                    [
                        'name' => 'frequencia_media',
                        'with_table_alias' => 'turmas_posgraduacao.frequencia_media',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'aprovacao_pct' => [
                "filters" => [
                    [
                        'name' => 'aprovacao_pct',
                        'with_table_alias' => 'turmas_posgraduacao.aprovacao_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'reprovacao_pct' => [
                "filters" => [
                    [
                        'name' => 'reprovacao_pct',
                        'with_table_alias' => 'turmas_posgraduacao.reprovacao_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'pendencia_pct' => [
                "filters" => [
                    [
                        'name' => 'pendencia_pct',
                        'with_table_alias' => 'turmas_posgraduacao.pendencia_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'alunos_fflch_pct' => [
                "filters" => [
                    [
                        'name' => 'alunos_fflch_pct',
                        'with_table_alias' => 'turmas_posgraduacao.alunos_fflch_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'alunos_externos_pct' => [
                "filters" => [
                    [
                        'name' => 'alunos_externos_pct',
                        'with_table_alias' => 'turmas_posgraduacao.alunos_externos_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'codigo_area' => [
                "filters" => [
                    [
                        'name' => 'codigo_area',
                        'with_table_alias' => 'turmas_posgraduacao.codigo_area',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'codigo_convenio' => [
                "filters" => [
                    [
                        'name' => 'codigo_convenio',
                        'with_table_alias' => 'turmas_posgraduacao.codigo_convenio',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nivel_convenio' => [
                "filters" => [
                    [
                        'name' => 'nivel_convenio',
                        'with_table_alias' => 'turmas_posgraduacao.nivel_convenio',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'lingua_turma' => [
                "filters" => [
                    [
                        'name' => 'lingua_turma',
                        'with_table_alias' => 'turmas_posgraduacao.lingua_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'formato_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'formato_oferecimento',
                        'with_table_alias' => 'turmas_posgraduacao.formato_oferecimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
