<?php

namespace App\Models\Graduacao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class DisciplinaGraduacao extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'disciplinas_graduacao';

    public function turmas()
    {
        return $this->hasMany(
            TurmaGraduacao::class,
            'codigo_disciplina',
            'codigo_disciplina'
        )->where('versao_disciplina', '=', $this->versao_disciplina);
        // ver: make a single primary key
    }

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
                        'with_table_alias' => 'disciplinas_graduacao.codigo_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'versao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'versao_disciplina',
                        'with_table_alias' => 'disciplinas_graduacao.versao_disciplina',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_disciplina' => [
                "filters" => [
                    [
                        'name' => 'nome_disciplina',
                        'with_table_alias' => 'disciplinas_graduacao.nome_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'situacao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'situacao_disciplina',
                        'with_table_alias' => 'disciplinas_graduacao.situacao_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_ativacao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'ano_ativacao_disciplina',
                        'with_table_alias' => 'disciplinas_graduacao.data_ativacao_disciplina',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_desativacao_disciplina' => [
                "filters" => [
                    [
                        'name' => 'ano_desativacao_disciplina',
                        'with_table_alias' => 'disciplinas_graduacao.data_desativacao_disciplina',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'credito_aula' => [
                "filters" => [
                    [
                        'name' => 'credito_aula',
                        'with_table_alias' => 'disciplinas_graduacao.credito_aula',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'credito_trabalho' => [
                "filters" => [
                    [
                        'name' => 'credito_trabalho',
                        'with_table_alias' => 'disciplinas_graduacao.credito_trabalho',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'duracao_disciplina_semanas' => [
                "filters" => [
                    [
                        'name' => 'duracao_disciplina_semanas',
                        'with_table_alias' => 'disciplinas_graduacao.duracao_disciplina_semanas',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'periodicidade_disciplina' => [
                "filters" => [
                    [
                        'name' => 'periodicidade_disciplina',
                        'with_table_alias' => 'disciplinas_graduacao.periodicidade_disciplina',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'carga_horaria_estagio' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_estagio',
                        'with_table_alias' => 'disciplinas_graduacao.carga_horaria_estagio',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'carga_horaria_licenciatura' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_licenciatura',
                        'with_table_alias' => 'disciplinas_graduacao.carga_horaria_licenciatura',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'carga_horaria_aacc' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_aacc',
                        'with_table_alias' => 'disciplinas_graduacao.carga_horaria_aacc',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
        ];
    }
}
