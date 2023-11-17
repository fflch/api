<?php

namespace App\Http\Repositories;

use App\Utilities\SQLBuilderUtils;

class DocentesRepository extends BaseRepository
{
    private $docentesColumns;

    public function __construct($validated)
    {
        $this->docentesColumns = [
            'vs.id_vinculo' => 'id_vinculo',
            'vs.numero_usp' => 'numero_usp',
            'p.nome' => 'nome',
            'vs.situacao_atual' => 'situacao_atual',
            'vs.data_inicio_vinculo' => 'data_inicio_vinculo',
            'vs.data_fim_vinculo' => 'data_fim_vinculo',
            'vs.cod_ultimo_setor' => 'codigo_ultimo_setor',
            'vs.nome_ultimo_setor' => 'nome_ultimo_setor',
            'vs.classe' => 'classe',
            'vs.referencia' => 'referencia',
            'vs.tipo_jornada' => 'tipo_jornada',
            'vs.tipo_ingresso' => 'tipo_ingresso',
            'vs.data_ultima_alteracao_funcional' => 'data_ultima_alteracao_funcional',
            'vs.ultima_ocorrencia' => 'ultima_ocorrencia',
            'vs.data_inicio_ultima_ocorrencia' => 'data_ultima_ocorrencia',
        ];

        parent::__construct($validated);
    }

    protected function buildSelectClause($columnsToHide)
    {
        return SQLBuilderUtils::SelectBuildHelper(
            $this->query,
            $this->docentesColumns,
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
        $this->query->where('vinculo', 'Docente');

        $directColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->docentesColumns,
            [   // public
                'id_vinculo',
                'codigo_ultimo_setor',
                'nome_ultimo_setor',
                'classe',
                'referencia',
                'tipo_jornada',
                // private
                'numero_usp',
                'situacao_atual',
                'tipo_ingresso',
                'ultima_ocorrencia',
            ]
        );

        $yearColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->docentesColumns,
            [
                // public
                'ano_fim_vinculo',
                'ano_ultima_ocorrencia',
                'ano_ultima_alteracao_funcional',
                // private
                'ano_inicio_vinculo',
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
