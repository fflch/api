<?php

namespace App\Mappings\Graduacao;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class DemandaTurmaGraduacaoMapping extends AbstractMapping
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
            'id_turma' => [
                "filters" => [
                    [
                        'name' => 'id_turma',
                        'with_table_alias' => 'demanda_turmas_graduacao.id_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'vagas_total' => [
                "filters" => [
                    [
                        'name' => 'vagas_total',
                        'with_table_alias' => 'demanda_turmas_graduacao.vagas_total',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'inscritos_total' => [
                "filters" => [
                    [
                        'name' => 'inscritos_total',
                        'with_table_alias' => 'demanda_turmas_graduacao.inscritos_total',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'matriculados_total' => [
                "filters" => [
                    [
                        'name' => 'matriculados_total',
                        'with_table_alias' => 'demanda_turmas_graduacao.matriculados_total',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vagas_tipo_obrigatoria' => [
                "filters" => [
                    [
                        'name' => 'vagas_tipo_obrigatoria',
                        'with_table_alias' => 'demanda_turmas_graduacao.vagas_tipo_obrigatoria',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'inscritos_tipo_obrigatoria' => [
                "filters" => [
                    [
                        'name' => 'inscritos_tipo_obrigatoria',
                        'with_table_alias' => 'demanda_turmas_graduacao.inscritos_tipo_obrigatoria',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'matriculados_tipo_obrigatoria' => [
                "filters" => [
                    [
                        'name' => 'matriculados_tipo_obrigatoria',
                        'with_table_alias' => 'demanda_turmas_graduacao.matriculados_tipo_obrigatoria',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vagas_tipo_opt_eletiva' => [
                "filters" => [
                    [
                        'name' => 'vagas_tipo_opt_eletiva',
                        'with_table_alias' => 'demanda_turmas_graduacao.vagas_tipo_opt_eletiva',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'inscritos_tipo_opt_eletiva' => [
                "filters" => [
                    [
                        'name' => 'inscritos_tipo_opt_eletiva',
                        'with_table_alias' => 'demanda_turmas_graduacao.inscritos_tipo_opt_eletiva',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'matriculados_tipo_opt_eletiva' => [
                "filters" => [
                    [
                        'name' => 'matriculados_tipo_opt_eletiva',
                        'with_table_alias' => 'demanda_turmas_graduacao.matriculados_tipo_opt_eletiva',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vagas_tipo_opt_livre' => [
                "filters" => [
                    [
                        'name' => 'vagas_tipo_opt_livre',
                        'with_table_alias' => 'demanda_turmas_graduacao.vagas_tipo_opt_livre',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'inscritos_tipo_opt_livre' => [
                "filters" => [
                    [
                        'name' => 'inscritos_tipo_opt_livre',
                        'with_table_alias' => 'demanda_turmas_graduacao.inscritos_tipo_opt_livre',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'matriculados_tipo_opt_livre' => [
                "filters" => [
                    [
                        'name' => 'matriculados_tipo_opt_livre',
                        'with_table_alias' => 'demanda_turmas_graduacao.matriculados_tipo_opt_livre',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vagas_tipo_extracurricular' => [
                "filters" => [
                    [
                        'name' => 'vagas_tipo_extracurricular',
                        'with_table_alias' => 'demanda_turmas_graduacao.vagas_tipo_extracurricular',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'inscritos_tipo_extracurricular' => [
                "filters" => [
                    [
                        'name' => 'inscritos_tipo_extracurricular',
                        'with_table_alias' => 'demanda_turmas_graduacao.inscritos_tipo_extracurricular',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'matriculados_tipo_extracurricular' => [
                "filters" => [
                    [
                        'name' => 'matriculados_tipo_extracurricular',
                        'with_table_alias' => 'demanda_turmas_graduacao.matriculados_tipo_extracurricular',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vagas_tipo_especial' => [
                "filters" => [
                    [
                        'name' => 'vagas_tipo_especial',
                        'with_table_alias' => 'demanda_turmas_graduacao.vagas_tipo_especial',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'inscritos_tipo_especial' => [
                "filters" => [
                    [
                        'name' => 'inscritos_tipo_especial',
                        'with_table_alias' => 'demanda_turmas_graduacao.inscritos_tipo_especial',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'matriculados_tipo_especial' => [
                "filters" => [
                    [
                        'name' => 'matriculados_tipo_especial',
                        'with_table_alias' => 'demanda_turmas_graduacao.matriculados_tipo_especial',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
        ];
    }
}
