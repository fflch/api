<?php

namespace App\Http\Repositories;

use App\Utilities\SQLBuilderUtils;

class ICsRepository extends BaseRepository
{
    private $icColumns;

    public function __construct($validated)
    {
        $this->icColumns = [
            'i.id_projeto' => 'id_projeto',
            'i.numero_usp' => 'numero_usp',
            'p.nome' => 'nome',
            'i.situacao_projeto' => 'situacao_projeto',
            'i.ano_projeto' => 'ano_projeto',
            'i.codigo_departamento' => 'codigo_departamento',
            'i.nome_departamento' => 'nome_departamento',
            'i.numero_usp_orientador' => 'numero_usp_orientador',
            'p2.nome' => 'nome_orientador',
            'i.data_inicio_projeto' => 'data_inicio_projeto',
            'i.data_fim_projeto' => 'data_fim_projeto',
            'i.titulo_projeto' => 'titulo_projeto',
            'i.palavras_chave' => 'palavras_chave',
        ];

        parent::__construct($validated);
    }

    protected function buildSelectClause($columnsToHide)
    {
        return SQLBuilderUtils::SelectBuildHelper(
            $this->query,
            $this->icColumns,
            $columnsToHide
        );
    }

    protected function buildFromClause()
    {
        return $this->query
            ->from('iniciacoes AS i')
            ->leftJoin('pessoas AS p', function ($join) {
                $join->on('i.numero_usp', '=', 'p.numero_usp');
            })
            ->leftJoin('pessoas AS p2', function ($join) {
                $join->on('i.numero_usp_orientador', '=', 'p2.numero_usp');
            });
    }

    protected function buildWhereClause($validated)
    {
        $directColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->icColumns,
            [
                // public
                'id_projeto',
                'situacao_projeto',
                'codigo_departamento',
                'nome_departamento',
                // private
                'numero_usp',
                'numero_usp_orientador',
            ]
        );

        $yearColumns = SQLBuilderUtils::findColumnsTableAlias(
            $this->icColumns,
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
