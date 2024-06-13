<?php

namespace App\Models\PosGraduacao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class DefesaPosGraduacao extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'defesas_posgraduacao';

    public function posgraduacao()
    {
        return $this->belongsTo(PosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }

    public function membroBanca()
    {
        return $this->hasMany(MembroBancaPG::class, 'id_defesa', 'id_defesa');
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
            'id_defesa' => [
                "filters" => [
                    [
                        'name' => 'id_defesa',
                        'with_table_alias' => 'defesas_posgraduacao.id_defesa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'id_posgraduacao' => [
                "filters" => [
                    [
                        'name' => 'id_posgraduacao',
                        'with_table_alias' => 'defesas_posgraduacao.id_posgraduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_defesa' => [
                "filters" => [
                    [
                        'name' => 'ano_defesa',
                        'with_table_alias' => 'defesas_posgraduacao.data_defesa',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'local_defesa' => [
                "filters" => []
            ],
            'mencao_honrosa' => [
                "filters" => [
                    [
                        'name' => 'mencao_honrosa',
                        'with_table_alias' => 'defesas_posgraduacao.mencao_honrosa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'titulo_trabalho' => [
                "filters" => []
            ],
        ];
    }
}
