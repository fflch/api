<?php

namespace App\Http\Repositories;

use App\Utilities\SQLBuilderUtils;

class EstagiariosRepository extends BaseRepository
{
    private $estagiariosColumns;

    public function __construct($validated)
    {
        $this->estagiariosColumns = [
            'vs.id_vinculo' => 'id_vinculo',
            'vs.numero_usp' => 'numero_usp',
            'p.nome' => 'nome',
            'vs.situacao_atual' => 'situacao_atual',
            'vs.data_inicio_vinculo' => 'data_inicio_vinculo',
            'vs.data_fim_vinculo' => 'data_fim_vinculo',
            'vs.cod_ultimo_setor' => 'codigo_ultimo_setor',
            'vs.nome_ultimo_setor' => 'nome_ultimo_setor',
            'vs.classe' => 'classe',
            'vs.tipo_jornada' => 'tipo_jornada',
            'vs.ultima_ocorrencia' => 'ultima_ocorrencia',
            'vs.data_inicio_ultima_ocorrencia' => 'data_ultima_ocorrencia',
        ];

        parent::__construct($validated);
    }

    protected function buildSelectClause($columnsToHide)
    {
        return SQLBuilderUtils::SelectBuildHelper(
            $this->query,
            $this->estagiariosColumns,
            $columnsToHide
        );
    }

    protected function buildFromClause()
    {
        return $this->query
            ->from('vinculos_servidores AS vs')
            ->leftJoin('pessoas AS p', function ($join) {
                $join->on('vs.numero_usp', '=', 'p.numero_usp');
            });
    }

    protected function buildWhereClause($validated)
    {
        $this->query->where('vinculo', 'Estagiário');

        $directColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->estagiariosColumns,
            [
                // public
                'id_vinculo',
                'situacao_atual',
                'codigo_ultimo_setor',
                'nome_ultimo_setor',
                'classe',
                'tipo_jornada',
                'ultima_ocorrencia',
                // private
                'numero_usp',
            ]
        );

        $yearColumns = [
            // manually find column table alias (as these columns do not exist)
            // public
            'ano_inicio_vinculo' => 'vs.data_inicio_vinculo',
            'ano_fim_vinculo' => 'vs.data_fim_vinculo',
            'ano_ultima_ocorrencia' => 'vs.data_inicio_ultima_ocorrencia',
        ];

        SQLBuilderUtils::processFilters(
            $this->query,
            $validated,
            $directColumns,
            $yearColumns
        );
    }
}
