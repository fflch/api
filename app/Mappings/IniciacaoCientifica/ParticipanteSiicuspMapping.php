<?php

namespace App\Mappings\IniciacaoCientifica;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class ParticipanteSiicuspMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => ['nome_participante'],
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
            'id_trabalho' => [
                "filters" => [
                    [
                        'name' => 'id_trabalho',
                        'with_table_alias' => 'siicusp_participantes.id_trabalho',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_participante' => [
                "filters" => [
                    [
                        'name' => 'tipo_participante',
                        'with_table_alias' => 'siicusp_participantes.tipo_participante',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'numero_usp' => [
                "filters" => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'siicusp_participantes.numero_usp',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_participante' => [
                "filters" => []
            ],
            'codigo_unidade' => [
                "filters" => [
                    [
                        'name' => 'codigo_unidade',
                        'with_table_alias' => 'siicusp_participantes.codigo_unidade',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ],
            ],
            'sigla_unidade' => [
                "filters" => [
                    [
                        'name' => 'sigla_unidade',
                        'with_table_alias' => 'siicusp_participantes.sigla_unidade',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_departamento' => [
                "filters" => [
                    [
                        'name' => 'codigo_departamento',
                        'with_table_alias' => 'siicusp_participantes.codigo_departamento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_departamento' => [
                "filters" => [
                    [
                        'name' => 'nome_departamento',
                        'with_table_alias' => 'siicusp_participantes.nome_departamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'participante_apresentador' => [
                "filters" => [
                    [
                        'name' => 'participante_apresentador',
                        'with_table_alias' => 'siicusp_participantes.participante_apresentador',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
