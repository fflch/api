<?php

namespace App\Mappings\Servidores;

use App\Mappings\AbstractMapping;
use App\Utilities\ValidationUtils;

class FuncionarioMapping extends AbstractMapping
{
    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'id_vinculo',
                    'data_inicio_vinculo',
                    'ultima_ocorrencia',
                    'tipo_ingresso'
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
            'id_vinculo' => [
                'filters' => [
                    [
                        'name' => 'id_vinculo',
                        'with_table_alias' => 'vinculos_servidores.id_vinculo',
                        'type' => 'normal',
                        'validation' => ValidationUtils::hashValidation(8),
                    ],
                ]
            ],
            'numero_usp' => [
                'filters' => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'vinculos_servidores.numero_usp',
                        'type' => 'normal',
                        'validation' => 'integer'
                    ],
                ]
            ],
            'situacao_atual' => [
                'filters' => [
                    [
                        'name' => 'situacao_atual',
                        'with_table_alias' => 'vinculos_servidores.situacao_atual',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_vinculo' => [
                'filters' => [
                    [
                        'name' => 'ano_inicio_vinculo',
                        'with_table_alias' => 'vinculos_servidores.data_inicio_vinculo',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_vinculo' => [
                'filters' => [
                    [
                        'name' => 'ano_fim_vinculo',
                        'with_table_alias' => 'vinculos_servidores.data_fim_vinculo',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'cod_ultimo_setor' => [
                'filters' => [
                    [
                        'name' => 'cod_ultimo_setor',
                        'with_table_alias' => 'vinculos_servidores.cod_ultimo_setor',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_ultimo_setor' => [
                'filters' => [
                    [
                        'name' => 'nome_ultimo_setor',
                        'with_table_alias' => 'vinculos_servidores.nome_ultimo_setor',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'ambito_funcao' => [
                'filters' => [
                    [
                        'name' => 'ambito_funcao',
                        'with_table_alias' => 'vinculos_servidores.ambito_funcao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'classe' => [
                'filters' => [
                    [
                        'name' => 'classe',
                        'with_table_alias' => 'vinculos_servidores.classe',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'referencia' => [
                'filters' => [
                    [
                        'name' => 'referencia',
                        'with_table_alias' => 'vinculos_servidores.referencia',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_jornada' => [
                'filters' => [
                    [
                        'name' => 'tipo_jornada',
                        'with_table_alias' => 'vinculos_servidores.tipo_jornada',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_ingresso' => [
                'filters' => [
                    [
                        'name' => 'tipo_ingresso',
                        'with_table_alias' => 'vinculos_servidores.tipo_ingresso',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_ultima_alteracao_funcional' => [
                'filters' => [
                    [
                        'name' => 'ano_ultima_alteracao_funcional',
                        'with_table_alias' => 'vinculos_servidores.data_ultima_alteracao_funcional',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'ultima_ocorrencia' => [
                'filters' => [
                    [
                        'name' => 'ultima_ocorrencia',
                        'with_table_alias' => 'vinculos_servidores.ultima_ocorrencia',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_ultima_ocorrencia' => [
                'filters' => [
                    [
                        'name' => 'ano_inicio_ultima_ocorrencia',
                        'with_table_alias' => 'vinculos_servidores.data_inicio_ultima_ocorrencia',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
        ];
    }
}
