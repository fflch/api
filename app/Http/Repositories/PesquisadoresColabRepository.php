<?php

namespace App\Http\Repositories;

use App\Utilities\SQLBuilderUtils;

class PesquisadoresColabRepository extends BaseRepository
{
    public function __construct($validated) {
        parent::__construct($validated);
    }

    protected function buildSelectClause()
    {
        return $this->query
            ->addSelect('pa.id_projeto')
            ->addSelect(
                SQLBuilderUtils::doubleHashSQL(
                    'pa.numero_usp',
                    $this->peppers[0], 
                    $this->peppers[1], 
                    'id_pesquisador'
                ))
            ->addSelect('p.nome AS nome_pesquisador')
            ->addSelect('pa.situacao_projeto')
            ->addSelect('pa.codigo_departamento')
            ->addSelect('pa.nome_departamento')
            ->addSelect('pa.data_inicio_projeto')
            ->addSelect('pa.data_fim_projeto')
            ->addSelect('pa.titulo_projeto')
            ->addSelect('pa.area_cnpq')
            ->addSelect('pa.palavras_chave');
    }

    protected function buildFromClause()
    {
        return $this->query
            ->from('pesquisas_avancadas AS pa')
            ->leftJoin('pessoas AS p', function ($join) {
                $join->on('pa.numero_usp', '=', 'p.numero_usp');
            });
    }

    protected function buildWhereClause($validated)
    {
        $this->query->where('modalidade', 'PC');

        $directColumns = [
            'id_projeto' => 'pa.id_projeto',
            'id_pesquisador' => SQLBuilderUtils::doubleHashSQL(
                'pa.numero_usp', $this->peppers[0], $this->peppers[1]
            ),
            'situacao_projeto' => 'pa.situacao_projeto',
            'codigo_departamento' => 'pa.codigo_departamento',
            'nome_departamento' => 'pa.nome_departamento',
        ];

        $yearColumns = [
            'ano_inicio' => 'pa.data_inicio_projeto',
            'ano_fim' => 'pa.data_fim_projeto'
        ];

        SQLBuilderUtils::processFilters(
            $this->query, 
            $validated, 
            $directColumns, 
            $yearColumns
        );
    }
}
