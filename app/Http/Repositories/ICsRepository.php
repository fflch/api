<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Utilities\SQLBuilderUtils;

class ICsRepository extends BaseRepository
{
    public function __construct($validated) {
        parent::__construct($validated);
    }

    protected function buildSelectClause()
    {
        return $this->query
            ->addSelect('i.id_projeto')
            ->addSelect(
                SQLBuilderUtils::doubleHashSQL(
                    'i.numero_usp',
                    $this->peppers[0],
                    $this->peppers[1],
                    'id_aluno'
                ))
            ->addSelect('p.nome')
            ->addSelect('i.situacao_projeto')
            ->addSelect('i.ano_projeto')
            ->addSelect('i.codigo_departamento')
            ->addSelect('i.nome_departamento')
            ->addSelect(
                SQLBuilderUtils::doubleHashSQL(
                    'i.numero_usp_orientador',
                    $this->peppers[0],
                    $this->peppers[1],
                    'id_orientador'
                ))
            ->addSelect('p2.nome AS nome_orientador')
            ->addSelect('i.data_inicio_projeto')
            ->addSelect('i.data_fim_projeto')
            ->addSelect('i.titulo_projeto')
            ->addSelect('i.palavras_chave');
    }

    protected function buildFromClause()
    {
        return $this->query
            ->from('iniciacoes AS i')
            ->leftJoin('pessoas AS p', function ($join) {
                $join->on('i.numero_usp', '=', 'p.numero_usp');
            })
            ->leftJoin('pessoas AS p2', function ($join) {
                $join->on('i.numero_usp_orientador', '=', 'p2.numero_usp');
            });
    }

    protected function buildWhereClause($validated)
    {
        $directColumns = [
            'id_projeto' => 'i.id_projeto',
            'id_aluno' => SQLBuilderUtils::doubleHashSQL(
                'i.numero_usp', $this->peppers[0], $this->peppers[1]
            ),
            'situacao_projeto' => 'i.situacao_projeto',
            'codigo_departamento' => 'i.codigo_departamento',
            'nome_departamento' => 'i.nome_departamento',
            'id_orientador' => SQLBuilderUtils::doubleHashSQL(
                'i.numero_usp_orientador', $this->peppers[0], $this->peppers[1]
            ),
        ];

        $yearColumns = [
            'ano_inicio' => 'i.data_inicio_projeto',
            'ano_fim' => 'i.data_fim_projeto'
        ];

        SQLBuilderUtils::processFilters(
            $this->query, 
            $validated, 
            $directColumns, 
            $yearColumns
        );
    }
}