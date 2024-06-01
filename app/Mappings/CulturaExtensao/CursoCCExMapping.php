<?php

namespace App\Mappings\CulturaExtensao;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class CursoCCExMapping extends AbstractMapping
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
            'codigo_curso_ceu' => [
                "filters" => [
                    [
                        'name' => 'codigo_curso_ceu',
                        'with_table_alias' => 'cursos_culturaextensao.codigo_curso_ceu',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'sigla_unidade' => [
                "filters" => [
                    [
                        'name' => 'sigla_unidade',
                        'with_table_alias' => 'cursos_culturaextensao.sigla_unidade',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_departamento' => [
                "filters" => [
                    [
                        'name' => 'codigo_departamento',
                        'with_table_alias' => 'cursos_culturaextensao.codigo_departamento',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_departamento' => [
                "filters" => [
                    [
                        'name' => 'nome_departamento',
                        'with_table_alias' => 'cursos_culturaextensao.nome_departamento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'modalidade_curso' => [
                "filters" => [
                    [
                        'name' => 'modalidade_curso',
                        'with_table_alias' => 'cursos_culturaextensao.modalidade_curso',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'nome_curso' => [
                "filters" => []
            ],
            'tipo' => [
                "filters" => [
                    [
                        'name' => 'tipo',
                        'with_table_alias' => 'cursos_culturaextensao.tipo',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_colegiado' => [
                "filters" => [
                    [
                        'name' => 'codigo_colegiado',
                        'with_table_alias' => 'cursos_culturaextensao.codigo_colegiado',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'sigla_colegiado' => [
                "filters" => [
                    [
                        'name' => 'sigla_colegiado',
                        'with_table_alias' => 'cursos_culturaextensao.sigla_colegiado',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'area_conhecimento' => [
                "filters" => [
                    [
                        'name' => 'area_conhecimento',
                        'with_table_alias' => 'cursos_culturaextensao.area_conhecimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'area_tematica' => [
                "filters" => [
                    [
                        'name' => 'area_tematica',
                        'with_table_alias' => 'cursos_culturaextensao.area_tematica',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'linha_extensao' => [
                "filters" => [
                    [
                        'name' => 'linha_extensao',
                        'with_table_alias' => 'cursos_culturaextensao.linha_extensao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
