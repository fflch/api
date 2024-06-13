<?php

namespace App\Models\Graduacao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class NotaIngressoGraduacao extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'notas_ingresso_graduacao';

    public function graduacao()
    {
        return $this->belongsTo(Graduacao::class, 'id_graduacao', 'id_graduacao');
    }

    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'codigo_prova',
                    'descricao_prova',
                    'pontos_obtidos',
                    'pontos_maximo'
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
            'id_graduacao' => [
                "filters" => [
                    [
                        'name' => 'id_graduacao',
                        'with_table_alias' => 'notas_ingresso_graduacao.id_graduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'codigo_prova' => [
                "filters" => [
                    [
                        'name' => 'codigo_prova',
                        'with_table_alias' => 'notas_ingresso_graduacao.codigo_prova',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'descricao_prova' => [
                "filters" => [
                    [
                        'name' => 'descricao_prova',
                        'with_table_alias' => 'notas_ingresso_graduacao.descricao_prova',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'pontos_obtidos' => [
                "filters" => [
                    [
                        'name' => 'pontos_obtidos',
                        'with_table_alias' => 'notas_ingresso_graduacao.pontos_obtidos',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'pontos_maximo' => [
                "filters" => [
                    [
                        'name' => 'pontos_maximo',
                        'with_table_alias' => 'notas_ingresso_graduacao.pontos_maximo',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ],
            ],
        ];
    }
}
