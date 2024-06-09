<?php

namespace App\Models\PosGraduacao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class MembroBancaPG extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'bancas_posgraduacao';

    public function defesa()
    {
        return $this->belongsTo(DefesaPosGraduacao::class, 'id_defesa', 'id_defesa');
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
            'id_participacao_banca' => [
                "filters" => [
                    [
                        'name' => 'id_participacao_banca',
                        'with_table_alias' => 'bancas_posgraduacao.id_participacao_banca',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'id_defesa' => [
                "filters" => [
                    [
                        'name' => 'id_defesa',
                        'with_table_alias' => 'bancas_posgraduacao.id_defesa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'numero_usp_membro' => [
                "filters" => [
                    [
                        'name' => 'numero_usp_membro',
                        'with_table_alias' => 'bancas_posgraduacao.numero_usp_membro',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'vinculo_participacao' => [
                "filters" => [
                    [
                        'name' => 'vinculo_participacao',
                        'with_table_alias' => 'bancas_posgraduacao.vinculo_participacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'participacao_assinalada' => [
                "filters" => [
                    [
                        'name' => 'participacao_assinalada',
                        'with_table_alias' => 'bancas_posgraduacao.participacao_assinalada',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'tipoAvaliacao' => [ // ver: to snake_case
                "filters" => [
                    [
                        'name' => 'tipoAvaliacao',
                        'with_table_alias' => 'bancas_posgraduacao.tipoAvaliacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'nota_defesa' => [
                "filters" => [
                    [
                        'name' => 'nota_defesa',
                        'with_table_alias' => 'bancas_posgraduacao.nota_defesa',
                        'type' => 'normal',
                        'validation' => 'integer'
                    ],
                ]
            ],
            'avaliacao_defesa' => [
                "filters" => [
                    [
                        'name' => 'avaliacao_defesa',
                        'with_table_alias' => 'bancas_posgraduacao.avaliacao_defesa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'especialista' => [
                "filters" => [
                    [
                        'name' => 'especialista',
                        'with_table_alias' => 'bancas_posgraduacao.especialista',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'avaliacao_escrita' => [
                "filters" => [
                    [
                        'name' => 'avaliacao_escrita',
                        'with_table_alias' => 'bancas_posgraduacao.avaliacao_escrita',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'voto_dupla_titulacao' => [
                "filters" => [
                    [
                        'name' => 'voto_dupla_titulacao',
                        'with_table_alias' => 'bancas_posgraduacao.voto_dupla_titulacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
