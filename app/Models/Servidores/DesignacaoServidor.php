<?php

namespace App\Models\Servidores;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class DesignacaoServidor extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'designacoes_servidores';

    public function vinculoServidor()
    {
        return $this->belongsTo(VinculoServidor::class, 'id_vinculo', 'id_vinculo');
    }

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
            'id_vinculo' => [
                "filters" => [
                    [
                        'name' => 'id_vinculo',
                        'with_table_alias' => 'designacoes_servidores.id_vinculo',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'numero_usp' => [ // ver: remove column from table
                "filters" => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'designacoes_servidores.numero_usp',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vinculo' => [ // ver: remove column from table
                "filters" => [
                    [
                        'name' => 'vinculo',
                        'with_table_alias' => 'designacoes_servidores.vinculo',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_designacao' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_designacao',
                        'with_table_alias' => 'designacoes_servidores.data_inicio_designacao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'data_fim_designacao' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_designacao',
                        'with_table_alias' => 'designacoes_servidores.data_fim_designacao',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ],
            ],
            'codigo_setor_designacao' => [
                "filters" => [
                    [
                        'name' => 'codigo_setor_designacao',
                        'with_table_alias' => 'designacoes_servidores.codigo_setor_designacao',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ],
            ],
            'nome_setor_designacao' => [
                "filters" => [
                    [
                        'name' => 'nome_setor_designacao',
                        'with_table_alias' => 'designacoes_servidores.nome_setor_designacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'nome_funcao' => [
                "filters" => [
                    [
                        'name' => 'nome_funcao',
                        'with_table_alias' => 'designacoes_servidores.nome_funcao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'tipo_designacao' => [
                "filters" => [
                    [
                        'name' => 'tipo_designacao',
                        'with_table_alias' => 'designacoes_servidores.tipo_designacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
        ];
    }
}
