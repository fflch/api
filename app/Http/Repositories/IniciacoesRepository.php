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
                i.id_projeto
                ,UPPER(SHA2(CONCAT(i.numero_usp, ?), 256)) AS 'id_pessoa'
                ,p.nome
                ,i.status_projeto
                ,i.ano_projeto
                ,i.codigo_departamento
                ,i.nome_departamento
                ,i.data_inicio_projeto
                ,i.data_fim_projeto
                ,i.titulo_projeto
                ,i.palavras_chave
            ";
    }

    private function getFromClause()
    {
        return
            "FROM iniciacoes i
                LEFT JOIN pessoas p ON i.numero_usp = p.numero_usp
            ";
    }
}
