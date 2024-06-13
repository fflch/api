<?php

namespace App\Models\CulturaExtensao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class MinistranteCCEx extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'ministrantes_ccex';

    public function oferecimento()
    {
        return $this->belongsTo(
            OferecimentoCCEx::class,
            'codigo_oferecimento',
            'codigo_oferecimento'
        );
    }

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
            'numero_usp' => [
                "filters" => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'ministrantes_ccex.numero_usp',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'codigo_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'codigo_oferecimento',
                        'with_table_alias' => 'ministrantes_ccex.codigo_oferecimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'turma' => [
                "filters" => [
                    [
                        'name' => 'turma',
                        'with_table_alias' => 'ministrantes_ccex.turma',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'funcao' => [
                "filters" => [
                    [
                        'name' => 'funcao',
                        'with_table_alias' => 'ministrantes_ccex.funcao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'forma_exercicio' => [
                "filters" => [
                    [
                        'name' => 'forma_exercicio',
                        'with_table_alias' => 'ministrantes_ccex.forma_exercicio',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'carga_horaria_horas' => [
                "filters" => [
                    [
                        'name' => 'carga_horaria_horas',
                        'with_table_alias' => 'ministrantes_ccex.carga_horaria_horas',
                        'type' => 'normal',
                        'validation' => 'numeric',
                    ],
                ]
            ],
            'data_inicio_turma' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_turma',
                        'with_table_alias' => 'ministrantes_ccex.data_inicio_turma',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_turma' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_turma',
                        'with_table_alias' => 'ministrantes_ccex.data_fim_turma',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ],
            ],
        ];
    }
}
