<?php

namespace App\Models\Graduacao;

use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class MinistranteGraduacao extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'ministrantes_graduacao';

    public function turma()
    {
        return $this->belongsTo(TurmaGraduacao::class, 'id_turma', 'id_turma');
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
            'numero_usp' => [
                "filters" => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'ministrantes_graduacao.numero_usp',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'id_turma' => [
                "filters" => [
                    [
                        'name' => 'id_turma',
                        'with_table_alias' => 'ministrantes_graduacao.id_turma',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'periodicidade_ministrante' => [
                "filters" => [
                    [
                        'name' => 'periodicidade_ministrante',
                        'with_table_alias' => 'ministrantes_graduacao.periodicidade_ministrante',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
        ];
    }
}
