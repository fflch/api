<?php

namespace App\Models\Graduacao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class Habilitacao extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'habilitacoes';

    public function graduacao()
    {
        return $this->belongsTo(Graduacao::class, 'id_graduacao', 'id_graduacao');
    }

    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => ['tipo_encerramento'],
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
                        'with_table_alias' => 'habilitacoes.id_graduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_curso' => [
                "filters" => [
                    [
                        'name' => 'codigo_curso',
                        'with_table_alias' => 'habilitacoes.codigo_curso',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'codigo_habilitacao' => [
                "filters" => [
                    [
                        'name' => 'codigo_habilitacao',
                        'with_table_alias' => 'habilitacoes.codigo_habilitacao',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_habilitacao' => [
                "filters" => [
                    [
                        'name' => 'nome_habilitacao',
                        'with_table_alias' => 'habilitacoes.nome_habilitacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_habilitacao' => [
                "filters" => [
                    [
                        'name' => 'tipo_habilitacao',
                        'with_table_alias' => 'habilitacoes.tipo_habilitacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'periodo_habilitacao' => [
                "filters" => [
                    [
                        'name' => 'periodo_habilitacao',
                        'with_table_alias' => 'habilitacoes.periodo_habilitacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_habilitacao' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_habilitacao',
                        'with_table_alias' => 'habilitacoes.data_inicio_habilitacao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_habilitacao' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_habilitacao',
                        'with_table_alias' => 'habilitacoes.data_fim_habilitacao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'tipo_encerramento' => [
                "filters" => [
                    [
                        'name' => 'tipo_encerramento',
                        'with_table_alias' => 'habilitacoes.tipo_encerramento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_colacao_grau' => [
                "filters" => [
                    [
                        'name' => 'ano_colacao_grau',
                        'with_table_alias' => 'habilitacoes.data_colacao_grau',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_expedicao_diploma' => [
                "filters" => [
                    [
                        'name' => 'ano_expedicao_diploma',
                        'with_table_alias' => 'habilitacoes.data_expedicao_diploma',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
        ];
    }
}
