<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class TurmaGraduacaoMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'trancamentos_pct',
                    'numero_alunos_final',
                    'pendencia_pct',
                    'recuperacao_pct',
                    'aprovacao_pct',
                    'reprov_nota_pct',
                    'reprov_freq_pct',
                    'reprov_ambos_pct',
                    'frequencia_media',
                    'nota_media',
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
                        'with_table_alias' => 'turmas_graduacao.id_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_disciplina' => [
                "filters" => [
                    [
                        'name' => 'codigo_disciplina',
                        'with_table_alias' => 'turmas_graduacao.codigo_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'versao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'versao_disciplina',
                        'with_table_alias' => 'turmas_graduacao.versao_disciplina',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'codigo_turma' => [
                "filters" => [
                    [
                        'name' => 'codigo_turma',
                        'with_table_alias' => 'turmas_graduacao.codigo_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_turma' => [
                "filters" => [
                    [
                        'name' => 'tipo_turma',
                        'with_table_alias' => 'turmas_graduacao.tipo_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_criacao_turma' => [
                "filters" => [
                    [
                        'name' => 'ano_criacao_turma',
                        'with_table_alias' => 'turmas_graduacao.data_criacao_turma',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'situacao_turma' => [
                "filters" => [
                    [
                        'name' => 'situacao_turma',
                        'with_table_alias' => 'turmas_graduacao.situacao_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_turma' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_turma',
                        'with_table_alias' => 'turmas_graduacao.data_inicio_turma',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_turma' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_turma',
                        'with_table_alias' => 'turmas_graduacao.data_fim_turma',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'carga_horaria_teorica' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_teorica',
                        'with_table_alias' => 'turmas_graduacao.carga_horaria_teorica',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'carga_horaria_pratica' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_pratica',
                        'with_table_alias' => 'turmas_graduacao.carga_horaria_pratica',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'numero_alunos_inicial' => [
                "filters" => [
                    [
                        'name' => 'numero_alunos_inicial',
                        'with_table_alias' => 'turmas_graduacao.numero_alunos_inicial',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'trancamentos_pct' => [
                "filters" => [
                    [
                        'name' => 'trancamentos_pct',
                        'with_table_alias' => 'turmas_graduacao.trancamentos_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'numero_alunos_final' => [
                "filters" => [
                    [
                        'name' => 'numero_alunos_final',
                        'with_table_alias' => 'turmas_graduacao.numero_alunos_final',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'pendencia_pct' => [
                "filters" => [
                    [
                        'name' => 'pendencia_pct',
                        'with_table_alias' => 'turmas_graduacao.pendencia_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'recuperacao_pct' => [
                "filters" => [
                    [
                        'name' => 'recuperacao_pct',
                        'with_table_alias' => 'turmas_graduacao.recuperacao_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'aprovacao_pct' => [
                "filters" => [
                    [
                        'name' => 'aprovacao_pct',
                        'with_table_alias' => 'turmas_graduacao.aprovacao_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'reprov_nota_pct' => [
                "filters" => [
                    [
                        'name' => 'reprov_nota_pct',
                        'with_table_alias' => 'turmas_graduacao.reprov_nota_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'reprov_freq_pct' => [
                "filters" => [
                    [
                        'name' => 'reprov_freq_pct',
                        'with_table_alias' => 'turmas_graduacao.reprov_freq_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'reprov_ambos_pct' => [
                "filters" => [
                    [
                        'name' => 'reprov_ambos_pct',
                        'with_table_alias' => 'turmas_graduacao.reprov_ambos_pct',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'frequencia_media' => [
                "filters" => [
                    [
                        'name' => 'frequencia_media',
                        'with_table_alias' => 'turmas_graduacao.frequencia_media',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'nota_media' => [
                "filters" => [
                    [
                        'name' => 'nota_media',
                        'with_table_alias' => 'turmas_graduacao.nota_media',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
        ];
    }
}
