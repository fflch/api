<?php

namespace App\Models\Graduacao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class TrancamentoGraduacao extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'trancamentos_graduacao';

    public function graduacao()
    {
        return $this->belongsTo(Graduacao::class, 'id_graduacao', 'id_graduacao');
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
            'id_graduacao' => [
                "filters" => [
                    [
                        'name' => 'id_graduacao',
                        'with_table_alias' => 'trancamentos_graduacao.id_graduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_registro_inicio_tranc' => [
                "filters" => [
                    [
                        'name' => 'ano_registro_inicio_tranc',
                        'with_table_alias' => 'trancamentos_graduacao.data_registro_inicio_tranc',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'periodo_inicio_trancamento' => [
                "filters" => [
                    [
                        'name' => 'periodo_inicio_trancamento',
                        'with_table_alias' => 'trancamentos_graduacao.periodo_inicio_trancamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_registro_fim_tranc' => [
                "filters" => [
                    [
                        'name' => 'ano_registro_fim_tranc',
                        'with_table_alias' => 'trancamentos_graduacao.data_registro_fim_tranc',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'periodo_fim_trancamento' => [
                "filters" => [
                    [
                        'name' => 'periodo_fim_trancamento',
                        'with_table_alias' => 'trancamentos_graduacao.periodo_fim_trancamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'semestres_trancados' => [
                "filters" => [
                    [
                        'name' => 'semestres_trancados',
                        'with_table_alias' => 'trancamentos_graduacao.semestres_trancados',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'sequencia_trancamento' => [
                "filters" => [
                    [
                        'name' => 'sequencia_trancamento',
                        'with_table_alias' => 'trancamentos_graduacao.sequencia_trancamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
