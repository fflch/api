<?php

namespace App\Models\PosGraduacao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class ConvenioPosGraduacao extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'posgraduacoes_conveniadas';

    public function posgraduacao()
    {
        return $this->belongsTo(PosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
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
            'id_posgraduacao' => [
                "filters" => [
                    [
                        'name' => 'id_posgraduacao',
                        'with_table_alias' => 'proficiencia_idiomas_pg.id_posgraduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_convenio' => [
                "filters" => [
                    [
                        'name' => 'codigo_convenio',
                        'with_table_alias' => 'proficiencia_idiomas_pg.codigo_convenio',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'sigla_convenio' => [
                "filters" => [
                    [
                        'name' => 'sigla_convenio',
                        'with_table_alias' => 'proficiencia_idiomas_pg.sigla_convenio',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'nome_convenio' => [
                "filters" => []
            ],
        ];
    }
}
