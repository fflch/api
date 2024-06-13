<?php

namespace App\Models\IniciacaoCientifica;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class BolsaIc extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'bolsas_ic';

    public function iniciacao()
    {
        return $this->belongsTo(Ic::class, 'id_projeto', 'id_projeto');
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
            'id_projeto' => [
                "filters" => [
                    [
                        'name' => 'id_projeto',
                        'with_table_alias' => 'bolsas_ic.id_projeto',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'sequencia_fomento' => [
                "filters" => [
                    [
                        'name' => 'sequencia_fomento',
                        'with_table_alias' => 'bolsas_ic.sequencia_fomento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_fomento' => [
                "filters" => [
                    [
                        'name' => 'nome_fomento',
                        'with_table_alias' => 'bolsas_ic.nome_fomento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'fomento_edital' => [
                "filters" => [
                    [
                        'name' => 'fomento_edital',
                        'with_table_alias' => 'bolsas_ic.fomento_edital',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'data_inicio_fomento' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_fomento',
                        'with_table_alias' => 'bolsas_ic.data_inicio_fomento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ]
                ]
            ],
            'data_fim_fomento' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_fomento',
                        'with_table_alias' => 'bolsas_ic.data_fim_fomento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ]
                ]
            ],
        ];
    }
}
