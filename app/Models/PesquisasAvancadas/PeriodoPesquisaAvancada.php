<?php

namespace App\Models\PesquisasAvancadas;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class PeriodoPesquisaAvancada extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'periodos_pesq_avancada';

    public function posdoc()
    {
        return $this->belongsTo(PesquisaAvancada::class, 'id_projeto', 'id_projeto');
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
            'sequencia_periodo' => [
                "filters" => [
                    [
                        'name' => 'sequencia_periodo',
                        'with_table_alias' => 'periodos_pesq_avancada.sequencia_periodo',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'situacao_periodo' => [
                "filters" => [
                    [
                        'name' => 'situacao_periodo',
                        'with_table_alias' => 'periodos_pesq_avancada.situacao_periodo',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_periodo' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_periodo',
                        'with_table_alias' => 'periodos_pesq_avancada.data_inicio_periodo',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_periodo' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_periodo',
                        'with_table_alias' => 'periodos_pesq_avancada.data_fim_periodo',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'fonte_recurso' => [
                "filters" => [
                    [
                        'name' => 'fonte_recurso',
                        'with_table_alias' => 'supervisoes_pesq_avancada.fonte_recurso',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'horas_semanais' => [
                "filters" => [
                    [
                        'name' => 'horas_semanais',
                        'with_table_alias' => 'supervisoes_pesq_avancada.horas_semanais',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ],
            ],
        ];
    }
}
