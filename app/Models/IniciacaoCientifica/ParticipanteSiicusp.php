<?php

namespace App\Models\IniciacaoCientifica;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class ParticipanteSiicusp extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'siicusp_participantes';

    public function trabalho()
    {
        return $this->belongsTo(TrabalhoSiicusp::class, 'id_trabalho', 'id_trabalho');
    }

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
