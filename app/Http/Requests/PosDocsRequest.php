<?php

namespace App\Http\Requests;

class PosDocsRequest extends PaginationRequest
{
    public function rules()
    {
        $situacaoOptions = [
            'aprovado',
            'cancelado',
            'reprovado',
            'encerrado',
            'inscrito',
            'ativo',
            'incompleto',
            'recusado',
        ];

        $dptoOptions = [
            'geografia',
            'filosofia',
            'letras classicas e vernaculas',
            'letras modernas',
            'teoria literaria e literatura comparada',
            'linguistica',
            'antropologia',
            'ciencia politica',
            'letras orientais',
            'sociologia',
            'historia',
        ];

        return array_merge(parent::rules(), [
            'id_projeto' => ['sometimes', 'regex:/^\d{4}-\d+$/'],
            'id_pesquisador' => ['sometimes', 'regex:/^[0-9a-fA-F]{40}$/'],
            'situacao_projeto' => ['sometimes', 'in:' . implode(',', $situacaoOptions)],
            'codigo_departamento' => ['sometimes', 'integer'],
            'nome_departamento' => ['sometimes', 'in:' . implode(',', $dptoOptions)],
            'id_supervisor' => ['sometimes', 'regex:/^[0-9a-fA-F]{40}$/'],
            'ano_inicio' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
            'ano_fim' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
        ]);
    }
}
