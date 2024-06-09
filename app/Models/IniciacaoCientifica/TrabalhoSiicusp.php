<?php

namespace App\Models\IniciacaoCientifica;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class TrabalhoSiicusp extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'siicusp_trabalhos';

    public function participantes()
    {
        return $this->hasMany(ParticipanteSiicusp::class, 'id_trabalho', 'id_trabalho');
    }

    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'prox_etapa_recomendado',
                    'prox_etapa_apresentado',
                    'mencao_honrosa'
                ],
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
            'id_trabalho' => [
                "filters" => [
                    [
                        'name' => 'id_trabalho',
                        'with_table_alias' => 'siicusp_trabalhos.id_trabalho',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'titulo_trabalho' => [
                "filters" => []
            ],
            'id_projeto_ic' => [
                "filters" => [
                    [
                        'name' => 'id_projeto_ic',
                        'with_table_alias' => 'siicusp_trabalhos.id_projeto_ic',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'edicao_siicusp' => [
                "filters" => [
                    [
                        'name' => 'edicao_siicusp',
                        'with_table_alias' => 'siicusp_trabalhos.edicao_siicusp',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'situacao_inscricao' => [
                "filters" => [
                    [
                        'name' => 'situacao_inscricao',
                        'with_table_alias' => 'siicusp_trabalhos.situacao_inscricao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ],
            ],
            'situacao_apresentacao' => [
                "filters" => [
                    [
                        'name' => 'situacao_apresentacao',
                        'with_table_alias' => 'siicusp_trabalhos.situacao_apresentacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'prox_etapa_recomendado' => [
                "filters" => [
                    [
                        'name' => 'prox_etapa_recomendado',
                        'with_table_alias' => 'siicusp_trabalhos.prox_etapa_recomendado',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'prox_etapa_apresentado' => [
                "filters" => [
                    [
                        'name' => 'prox_etapa_apresentado',
                        'with_table_alias' => 'siicusp_trabalhos.prox_etapa_apresentado',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'mencao_honrosa' => [
                "filters" => [
                    [
                        'name' => 'mencao_honrosa',
                        'with_table_alias' => 'siicusp_trabalhos.mencao_honrosa',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_dpto_orientador' => [
                "filters" => [
                    [
                        'name' => 'codigo_dpto_orientador',
                        'with_table_alias' => 'siicusp_trabalhos.codigo_dpto_orientador',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_dpto_orientador' => [
                "filters" => [
                    [
                        'name' => 'nome_dpto_orientador',
                        'with_table_alias' => 'siicusp_trabalhos.nome_dpto_orientador',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
