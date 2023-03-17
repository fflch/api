<?php

namespace App\Utilities;

class SQLBuilderUtils
{
    public static function getRowCount()
    {
        return
            "SELECT COUNT(*) AS 'count'";
    }

    public static function paginationQuery(int $page, int $limit)
    {
        $offset = ($page - 1) * $limit;
        return "LIMIT {$limit} OFFSET {$offset}";
    }

    public static function rangeDisplay($page, $limit, $totalRecords)
    {
        $limiteInferior = (($limit * ($page - 1)) + 1);
        $limiteSuperior = ($limit * $page);

        $display = $limiteInferior > $totalRecords
                    ? "No records in this page"
                    : ($totalRecords > $limiteSuperior
                        ? $limiteInferior . "-" . $limiteSuperior
                        : $limiteInferior . "-" . $totalRecords
                    );

        return $display;
    }
}
