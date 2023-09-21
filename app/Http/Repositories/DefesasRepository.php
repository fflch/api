<?php

namespace App\Http\Repositories;

use App\Utilities\SQLBuilderUtils;

class DefesasRepository extends BaseRepository
{
    public function __construct($validated) {
        parent::__construct($validated);
    }

    protected function buildSelectClause()
    {
        return $this->query
            ->addSelect(
                SQLBuilderUtils::singleHashSQL(
                    'dp.id_defesa',
                    $this->peppers[0],
                    'id_defesa',
                    $size = 8
                ))
            ->addSelect(
                SQLBuilderUtils::doubleHashSQL(
                    'pg.numero_usp',
                    $this->peppers[0],
                    $this->peppers[1],
                    'id_aluno'
                ))
            ->addSelect('p.nome AS nome_aluno')
            ->addSelect(
                SQLBuilderUtils::singleHashSQL(
                    'dp.id_posgraduacao',
                    $this->peppers[0],
                    'id_posgraduacao'
                ))
            ->addSelect('pg.nivel_programa')
            ->addSelect('pg.codigo_area')
            ->addSelect('pg.nome_area')
            ->addSelect('pg.codigo_programa')
            ->addSelect('pg.nome_programa')
            ->addSelect('dp.data_defesa')
            ->addSelect('dp.local_defesa')
            ->addSelect('dp.mencao_honrosa')
            ->addSelect('dp.titulo_trabalho');
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
        $directColumns = [
            'id_defesa' => SQLBuilderUtils::singleHashSQL(
                'dp.id_defesa', $this->peppers[0], null, $size = 8
            ),
            'id_aluno' => SQLBuilderUtils::doubleHashSQL(
                'pg.numero_usp', $this->peppers[0], $this->peppers[1]
            ),
            'id_posgraduacao' => SQLBuilderUtils::singleHashSQL(
                'dp.id_posgraduacao', $this->peppers[0]
            ),
            'nivel_programa' => 'pg.nivel_programa',
            'codigo_area' => 'pg.codigo_area',
            'codigo_programa' => 'pg.codigo_programa',
            'mencao_honrosa' => 'dp.mencao_honrosa',
        ];

        $yearColumns = [
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