<?php

namespace App\Mappings\Pessoas;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class PessoaMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'nome',
                    'email',
                    'data_nascimento',
                    'data_falecimento',
                    'cidade_nascimento',
                    'orientacao_sexual',
                    'situacao_vacinal_covid',
                    'identidade_genero',
                    'cpf',
                ],
                'HASH' => [
                    'numero_usp'
                ],
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
                'filters' => []
            ],
            'nome' => [
                'filters' => []
            ],
            'data_nascimento' => [
                'filters' => [
                    [

                        'name' => 'ano_nascimento',
                        'with_table_alias' => 'pessoas.data_nascimento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_falecimento' => [
                'filters' => [
                    [

                        'name' => 'ano_falecimento',
                        'with_table_alias' => 'pessoas.data_falecimento',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'email' => [
                'filters' => []
            ],
            'nacionalidade' => [
                'filters' => [
                    [

                        'name' => 'nacionalidade',
                        'with_table_alias' => 'pessoas.nacionalidade',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'cidade_nascimento' => [
                'filters' => [
                    [

                        'name' => 'cidade_nascimento',
                        'with_table_alias' => 'pessoas.cidade_nascimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'estado_nascimento' => [
                'filters' => [
                    [

                        'name' => 'estado_nascimento',
                        'with_table_alias' => 'pessoas.estado_nascimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'pais_nascimento' => [
                'filters' => [
                    [

                        'name' => 'pais_nascimento',
                        'with_table_alias' => 'pessoas.pais_nascimento',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'raca' => [
                'filters' => [
                    [

                        'name' => 'raca',
                        'with_table_alias' => 'pessoas.raca',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'sexo' => [
                'filters' => [
                    [

                        'name' => 'sexo',
                        'with_table_alias' => 'pessoas.sexo',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'orientacao_sexual' => [
                'filters' => [
                    [

                        'name' => 'orientacao_sexual',
                        'with_table_alias' => 'pessoas.orientacao_sexual',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'identidade_genero' => [
                'filters' => [
                    [

                        'name' => 'identidade_genero',
                        'with_table_alias' => 'pessoas.identidade_genero',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'situacao_vacinal_covid' => [
                'filters' => [
                    [

                        'name' => 'situacao_vacinal_covid',
                        'with_table_alias' => 'pessoas.situacao_vacinal_covid',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
