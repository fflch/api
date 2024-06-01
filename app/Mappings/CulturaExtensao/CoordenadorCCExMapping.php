<?php

namespace App\Mappings\CulturaExtensao;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class CoordenadorCCExMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [],
                'HASH' => ['numero_usp'],
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
            'numero_usp' => [
                "filters" => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'coordenadores_ccex.numero_usp',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'codigo_oferecimento' => [
                "filters" => [
                    [
                        'name' => 'codigo_oferecimento',
                        'with_table_alias' => 'coordenadores_ccex.codigo_oferecimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'funcao' => [
                "filters" => [
                    [
                        'name' => 'funcao',
                        'with_table_alias' => 'coordenadores_ccex.funcao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'forma_exercicio' => [
                "filters" => [
                    [
                        'name' => 'forma_exercicio',
                        'with_table_alias' => 'coordenadores_ccex.forma_exercicio',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
