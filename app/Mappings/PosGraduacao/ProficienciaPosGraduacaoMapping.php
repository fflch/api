<?php

namespace App\Mappings\PosGraduacao;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class ProficienciaPosGraduacaoMapping extends AbstractMapping
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
            'idioma' => [
                "filters" => [
                    [
                        'name' => 'idioma',
                        'with_table_alias' => 'proficiencia_idiomas_pg.idioma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_exame' => [
                "filters" => [
                    [
                        'name' => 'ano_data_exame',
                        'with_table_alias' => 'proficiencia_idiomas_pg.data_exame',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
        ];
    }
}
