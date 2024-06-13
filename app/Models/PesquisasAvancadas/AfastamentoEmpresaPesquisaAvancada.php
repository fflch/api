<?php

namespace App\Models\PesquisasAvancadas;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class AfastamentoEmpresaPesquisaAvancada extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'afastempresas_pesq_avancada';

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
                        'with_table_alias' => 'afastempresas_pesq_avancada.sequencia_periodo',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'seq_vinculo_empresa' => [
                "filters" => [
                    [
                        'name' => 'seq_vinculo_empresa',
                        'with_table_alias' => 'afastempresas_pesq_avancada.seq_vinculo_empresa',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_empresa' => [
                "filters" => [
                    [
                        'name' => 'nome_empresa',
                        'with_table_alias' => 'afastempresas_pesq_avancada.nome_empresa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_afastamento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_afastamento',
                        'with_table_alias' => 'afastempresas_pesq_avancada.data_inicio_afastamento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_afastamento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_afastamento',
                        'with_table_alias' => 'afastempresas_pesq_avancada.data_fim_afastamento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'tipo_vinculo' => [
                "filters" => [
                    [
                        'name' => 'tipo_vinculo',
                        'with_table_alias' => 'supervisoes_pesq_avancada.tipo_vinculo',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
