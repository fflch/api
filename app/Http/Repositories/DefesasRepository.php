<?php

namespace App\Http\Repositories;

use App\Utilities\Deparas;
use App\Utilities\SQLBuilderUtils;

class DefesasRepository extends BaseRepository
{
    private $defesasColumns;

    public function __construct($validated)
    {
        if (isset($validated['nivel_programa'])) {
            $validated['nivel_programa'] = 
                Deparas::nivelPg[$validated['nivel_programa']]
                    ?? $validated['nivel_programa'];
        }

        $this->defesasColumns = [
            'dp.id_defesa' => 'id_defesa',
            'pg.numero_usp' => 'numero_usp',
            'p.nome' => 'nome',
            'dp.id_posgraduacao' => 'id_posgraduacao',
            'pg.nivel_programa' => 'nivel_programa',
            'pg.codigo_area' => 'codigo_area',
            'pg.nome_area' => 'nome_area',
            'pg.codigo_programa' => 'codigo_programa',
            'pg.nome_programa' => 'nome_programa',
            'dp.data_defesa' => 'data_defesa',
            'dp.local_defesa' => 'local_defesa',
            'dp.mencao_honrosa' => 'mencao_honrosa',
            'dp.titulo_trabalho' => 'titulo_trabalho',
        ];

        parent::__construct($validated);
    }

    protected function buildSelectClause($columnsToHide)
    {
        return SQLBuilderUtils::SelectBuildHelper(
            $this->query,
            $this->defesasColumns,
            $columnsToHide
        );
    }

    protected function buildFromClause()
    {
        return $this->query
            ->from('defesas_posgraduacao AS dp')
            ->leftJoin('posgraduacoes AS pg', function ($join) {
                $join->on('dp.id_posgraduacao', '=', 'pg.id_posgraduacao');
            })
            ->leftJoin('pessoas AS p', function ($join) {
                $join->on('pg.numero_usp', '=', 'p.numero_usp');
            });
    }

    protected function buildWhereClause($validated)
    {
        $directColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->defesasColumns,
            [
                // public
                'id_defesa',
                'id_posgraduacao',
                'nivel_programa',
                'codigo_area',
                'codigo_programa',
                'mencao_honrosa',
                // private
                'numero_usp',
            ]
        );

        $yearColumns = [
            // manually find column table alias (as these columns do not exist)
            // public
            'ano_defesa' => 'dp.data_defesa',
        ];

        SQLBuilderUtils::processFilters(
            $this->query,
            $validated,
            $directColumns,
            $yearColumns
        );
    }
}
