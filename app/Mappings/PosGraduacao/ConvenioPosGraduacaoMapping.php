<?php

namespace App\Mappings\PosGraduacao;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class ConvenioPosGraduacaoMapping extends AbstractMapping
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
