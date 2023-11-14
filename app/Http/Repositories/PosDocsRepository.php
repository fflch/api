<?php

namespace App\Http\Repositories;

use App\Utilities\SQLBuilderUtils;
use Illuminate\Support\Facades\DB;

class PosDocsRepository extends BaseRepository
{
    private $posdocColumns;

    public function __construct($validated)
    {
        $this->posdocColumns = [
            'pa.id_projeto' => 'id_projeto',
            'pa.numero_usp' => 'numero_usp',
            'p.nome' => 'nome_pesquisador',
            'pa.situacao_projeto' => 'situacao_projeto',
            'pa.codigo_departamento' => 'codigo_departamento',
            'pa.nome_departamento' => 'nome_departamento',
            'pa.data_inicio_projeto' => 'data_inicio_projeto',
            'pa.data_fim_projeto' => 'data_fim_projeto',
            'spa.numero_usp_supervisor' => 'numero_usp_supervisor',
            'p2.nome' => 'nome_supervisor',
            'pa.titulo_projeto' => 'titulo_projeto',
            'pa.area_cnpq' => 'area_cnpq',
            'pa.palavras_chave' => 'palavras_chave'
        ];

        parent::__construct($validated);
    }

    protected function buildSelectClause($columnsToHide)
    {
        return SQLBuilderUtils::SelectBuildHelper(
            $this->query,
            $this->posdocColumns,
            $columnsToHide
        );
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
                $join->on('spa.ultimo_supervisor_resp', '=', DB::connection('etl')->raw("'S'"));
            })
            ->leftJoin('pessoas AS p2', function ($join) {
                $join->on('spa.numero_usp_supervisor', '=', 'p2.numero_usp');
            });
    }

    protected function buildWhereClause($validated)
    {
        $this->query->where('modalidade', 'PD');

        $directColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->posdocColumns,
            [
                // public
                'id_projeto',
                'situacao_projeto',
                'codigo_departamento',
                'nome_departamento',
                // private
                'numero_usp',
                'numero_usp_supervisor',
            ]
        );

        $yearColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->posdocColumns,
            [
                // public
                'ano_inicio',
                'ano_fim',
            ]
        );

        SQLBuilderUtils::processFilters(
            $this->query,
            $validated,
            $directColumns,
            $yearColumns
        );
    }
}
