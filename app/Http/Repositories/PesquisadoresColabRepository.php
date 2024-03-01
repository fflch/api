<?php

namespace App\Http\Repositories;

use App\Utilities\SQLBuilderUtils;

class PesquisadoresColabRepository extends BaseRepository
{
    private $pcColumns;

    public function __construct($validated)
    {
        $this->pcColumns = [
            'pa.id_projeto' => 'id_projeto',
            'pa.numero_usp' => 'numero_usp',
            'p.nome' => 'nome_pesquisador',
            'pa.situacao_projeto' => 'situacao_projeto',
            'pa.codigo_departamento' => 'codigo_departamento',
            'pa.nome_departamento' => 'nome_departamento',
            'pa.data_inicio_projeto' => 'data_inicio_projeto',
            'pa.data_fim_projeto' => 'data_fim_projeto',
            'pa.titulo_projeto' => 'titulo_projeto',
            'pa.area_cnpq' => 'area_cnpq',
            'pa.palavras_chave' => 'palavras_chave',
        ];

        parent::__construct($validated);
    }

    protected function buildSelectClause($columnsToHide)
    {
        return SQLBuilderUtils::SelectBuildHelper(
            $this->query,
            $this->pcColumns,
            $columnsToHide
        );
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

        $directColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->pcColumns,
            [
                // public
                'id_projeto',
                'situacao_projeto',
                'codigo_departamento',
                'nome_departamento',
                // private
                'numero_usp',
            ]
        );

        $yearColumns = [
            // manually find column table alias (as these columns do not exist)
            // public
            'ano_inicio' => 'pa.data_inicio_projeto',
            'ano_fim' => 'pa.data_fim_projeto',
        ];

        SQLBuilderUtils::processFilters(
            $this->query,
            $validated,
            $directColumns,
            $yearColumns
        );
    }
}
