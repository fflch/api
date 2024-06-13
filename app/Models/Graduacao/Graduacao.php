<?php

namespace App\Models\Graduacao;

use App\Models\Pessoas\Pessoa;
use App\Models\AbstractEtlTableModel;
use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;
use App\Utilities\ValidationUtils;

class Graduacao extends AbstractEtlTableModel
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';
    protected $table = 'graduacoes';

    public function aluno()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp', 'numero_usp');
    }

    public function habilitacoes()
    {
        return $this->hasMany(Habilitacao::class, 'id_graduacao', 'id_graduacao');
    }

    public function trancamentos()
    {
        return $this->hasMany(TrancamentoGraduacao::class, 'id_graduacao', 'id_graduacao');
    }

    public function notasIngresso()
    {
        return $this->hasMany(NotaIngressoGraduacao::class, 'id_graduacao', 'id_graduacao');
    }

    public static function getAccessLevels()
    {
        return [
            'public' => [
                'HIDE' => [
                    'rank_ingresso',
                    'tipo_encerramento_bacharelado',
                    'tipo_encerramento_licenciatura'
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
                        'with_table_alias' => 'graduacoes.id_graduacao',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'numero_usp' => [
                "filters" => [
                    [
                        'name' => 'numero_usp',
                        'with_table_alias' => 'graduacoes.numero_usp',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'sequencia_grad' => [
                "filters" => [
                    [
                        'name' => 'sequencia_grad',
                        'with_table_alias' => 'graduacoes.sequencia_grad',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'situacao_curso' => [
                "filters" => [
                    [
                        'name' => 'situacao_curso',
                        'with_table_alias' => 'graduacoes.situacao_curso',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_inicio_vinculo' => [
                "filters" => [
                    [
                        'name' => 'ano_inicio_vinculo',
                        'with_table_alias' => 'graduacoes.data_inicio_vinculo',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ],
            ],
            'data_fim_vinculo' => [
                "filters" => [
                    [
                        'name' => 'ano_fim_vinculo',
                        'with_table_alias' => 'graduacoes.data_fim_vinculo',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'codigo_curso' => [
                "filters" => [
                    [
                        'name' => 'codigo_curso',
                        'with_table_alias' => 'graduacoes.codigo_curso',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'nome_curso' => [
                "filters" => [
                    [
                        'name' => 'nome_curso',
                        'with_table_alias' => 'graduacoes.nome_curso',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_ingresso' => [
                "filters" => [
                    [
                        'name' => 'tipo_ingresso',
                        'with_table_alias' => 'graduacoes.tipo_ingresso',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'categoria_ingresso' => [
                "filters" => [
                    [
                        'name' => 'categoria_ingresso',
                        'with_table_alias' => 'graduacoes.categoria_ingresso',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'rank_ingresso' => [
                "filters" => [
                    [
                        'name' => 'rank_ingresso',
                        'with_table_alias' => 'graduacoes.rank_ingresso',
                        'type' => 'normal',
                        'validation' => 'integer',
                    ],
                ]
            ],
            'bacharelado' => [
                "filters" => [
                    [
                        'name' => 'bacharelado',
                        'with_table_alias' => 'graduacoes.bacharelado',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_encerramento_bacharelado' => [
                "filters" => [
                    [
                        'name' => 'tipo_encerramento_bacharelado',
                        'with_table_alias' => 'graduacoes.tipo_encerramento_bacharelado',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_encerramento_bacharelado' => [
                "filters" => [
                    [
                        'name' => 'ano_encerramento_bacharelado',
                        'with_table_alias' => 'graduacoes.data_encerramento_bacharelado',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
            'licenciatura' => [
                "filters" => [
                    [
                        'name' => 'licenciatura',
                        'with_table_alias' => 'graduacoes.licenciatura',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'tipo_encerramento_licenciatura' => [
                "filters" => [
                    [
                        'name' => 'tipo_encerramento_licenciatura',
                        'with_table_alias' => 'graduacoes.tipo_encerramento_licenciatura',
                        'type' => 'normal',
                        'validation' => ValidationUtils::stringValidation(),
                    ],
                ]
            ],
            'data_encerramento_licenciatura' => [
                "filters" => [
                    [
                        'name' => 'ano_encerramento_licenciatura',
                        'with_table_alias' => 'graduacoes.data_encerramento_licenciatura',
                        'type' => 'year',
                        'validation' => ValidationUtils::yearValidation(),
                    ],
                ]
            ],
        ];
    }
}
