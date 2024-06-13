<?php

namespace App\Models\CulturaExtensao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class InscricaoCCEx extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'inscricoes_ccex';

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
            'codigo_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'codigo_oferecimento',
                        'with_table_alias' => 'inscricoes_ccex.codigo_oferecimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'numero_ceu' => [
                "filters" => [
                    [
                        'name' => 'numero_ceu',
                        'with_table_alias' => 'inscricoes_ccex.numero_ceu',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'data_inscricao' => [
                "filters" => [
                    [
                        'name' => 'ano_inscricao',
                        'with_table_alias' => 'inscricoes_ccex.data_inscricao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'situacao_inscricao' => [
                "filters" => [
                    [
                        'name' => 'situacao_inscricao',
                        'with_table_alias' => 'inscricoes_ccex.situacao_inscricao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'origem_inscricao' => [
                "filters" => [
                    [
                        'name' => 'origem_inscricao',
                        'with_table_alias' => 'inscricoes_ccex.origem_inscricao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
