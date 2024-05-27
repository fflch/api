<?php

namespace App\Mappings;

use App\Utilities\ValidationUtils;

class DisciplinaPosGraduacaoMapping extends AbstractMapping
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
            'codigo_disciplina' => [
                "filters" => [
                    [
                        'name' => 'codigo_disciplina',
                        'with_table_alias' => 'disciplinas_posgraduacao.codigo_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'versao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'versao_disciplina',
                        'with_table_alias' => 'disciplinas_posgraduacao.versao_disciplina',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'departamento' => [
                "filters" => [
                    [
                        'name' => 'departamento',
                        'with_table_alias' => 'disciplinas_posgraduacao.departamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'nome_disciplina' => [
                "filters" => [
                    [
                        'name' => 'nome_disciplina',
                        'with_table_alias' => 'disciplinas_posgraduacao.nome_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_curso' => [
                "filters" => [
                    [
                        'name' => 'tipo_curso',
                        'with_table_alias' => 'disciplinas_posgraduacao.tipo_curso',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'situacao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'situacao_disciplina',
                        'with_table_alias' => 'disciplinas_posgraduacao.situacao_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_proposicao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'ano_proposicao_disciplina',
                        'with_table_alias' => 'disciplinas_posgraduacao.data_proposicao_disciplina',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_ativacao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'ano_ativacao_disciplina',
                        'with_table_alias' => 'disciplinas_posgraduacao.data_ativacao_disciplina',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_desativacao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'ano_desativacao_disciplina',
                        'with_table_alias' => 'disciplinas_posgraduacao.data_desativacao_disciplina',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'codigo_area' => [
                "filters" => [
                    [
                        'name' => 'codigo_area',
                        'with_table_alias' => 'disciplinas_posgraduacao.codigo_area',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_area' => [
                "filters" => [
                    [
                        'name' => 'nome_area',
                        'with_table_alias' => 'disciplinas_posgraduacao.nome_area',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_programa' => [
                "filters" => [
                    [
                        'name' => 'codigo_programa',
                        'with_table_alias' => 'disciplinas_posgraduacao.codigo_programa',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_programa' => [
                "filters" => [
                    [
                        'name' => 'nome_programa',
                        'with_table_alias' => 'disciplinas_posgraduacao.nome_programa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'duracao_disciplina_semanas' => [
                "filters" => [
                    [
                        'name' => 'duracao_disciplina_semanas',
                        'with_table_alias' => 'disciplinas_posgraduacao.duracao_disciplina_semanas',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'carga_horaria_teorica' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_teorica',
                        'with_table_alias' => 'disciplinas_posgraduacao.carga_horaria_teorica',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'carga_horaria_pratica' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_pratica',
                        'with_table_alias' => 'disciplinas_posgraduacao.carga_horaria_pratica',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'carga_horaria_estudo' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_estudo',
                        'with_table_alias' => 'disciplinas_posgraduacao.carga_horaria_estudo',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'carga_horaria_total' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_total',
                        'with_table_alias' => 'disciplinas_posgraduacao.carga_horaria_total',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'total_creditos' => [
                "filters" => [
                    [
                        'name' => 'total_creditos',
                        'with_table_alias' => 'disciplinas_posgraduacao.total_creditos',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'formato_disciplina' => [
                "filters" => [
                    [
                        'name' => 'formato_disciplina',
                        'with_table_alias' => 'disciplinas_posgraduacao.formato_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
