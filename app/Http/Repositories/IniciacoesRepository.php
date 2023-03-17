<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Utilities\SQLBuilderUtils;
use App\Models\DataQuery;
use App\Models\CountQuery;

class IniciacoesRepository
{
    public function getIniciacoesData(int $page, int $limit)
    {
        $count = self::getIniciacoesCount();

        $fieldsQuery = self::getSelectColumns()
                     . self::getFromClause()
                     . SQLBuilderUtils::paginationQuery($page, $limit);

        $data = DB::connection('etl')->select($fieldsQuery, [$_ENV['HASH_PEPPER']]);

        return new DataQuery(
            $count['totalRecords'],
            $page,
            $limit,
            $data
        );
    }

    public function getIniciacoesCount()
    {
        $countQuery = SQLBuilderUtils::getRowCount()
                     . self::getFromClause();

        $result = DB::connection('etl')->select($countQuery);

        return ['totalRecords' => $result[0]->count];
    }

    private function getSelectColumns()
    {
        return
            "SELECT
                i.idProjeto
                ,UPPER(SHA2(CONCAT(i.numeroUSP, ?), 256)) AS 'idPessoa'
                ,ag.nomeAluno
                ,i.statusProjeto
                ,i.anoProjeto
                ,i.codigoDepartamento
                ,i.nomeDepartamento
                ,i.dataInicioProjeto
                ,i.dataFimProjeto
                ,i.tituloProjeto
                ,i.palavrasChave
            ";
    }

    private function getFromClause()
    {
        return
            "FROM iniciacoes i
            LEFT JOIN alunos_graduacao ag ON i.numeroUSP = ag.numeroUSP
            ";
    }
}
