<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Utilities\SQLBuilderUtils;

class PosDocsRepository extends BaseRepository
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
            ->addSelect(
                SQLBuilderUtils::doubleHashSQL(
                    'spa.numero_usp_supervisor',
                    $this->peppers[0],
                    $this->peppers[1],
                    'id_supervisor'
                ))
            ->addSelect('p2.nome AS nome_supervisor')
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
            })
            ->leftJoin('supervisoes_pesq_avancada AS spa', function ($join) {
                $join->on('pa.id_projeto', '=', 'spa.id_projeto');
                $join->on('spa.ultimo_supervisor_resp', '=', DB::raw("'S'"));
            })
            ->leftJoin('pessoas AS p2', function ($join) {
                $join->on('spa.numero_usp_supervisor', '=', 'p2.numero_usp');
            });
    }

    protected function buildWhereClause($validated)
    {
        $this->query->where('modalidade', 'PD');

        $directColumns = [
            'id_projeto' => 'pa.id_projeto',
            'id_pesquisador' => SQLBuilderUtils::doubleHashSQL(
                'pa.numero_usp', $this->peppers[0], $this->peppers[1]
            ),
            'situacao_projeto' => 'pa.situacao_projeto',
            'codigo_departamento' => 'pa.codigo_departamento',
            'nome_departamento' => 'pa.nome_departamento',
            'id_supervisor' => SQLBuilderUtils::doubleHashSQL(
                'spa.numero_usp_supervisor', $this->peppers[0], $this->peppers[1]
            ),
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
