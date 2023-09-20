<?php

namespace App\Http\Requests;

class ICsRequest extends PaginationRequest
{
    public function rules()
    {
        $situacaoOptions = [
            'pendente', 
            'aprovado', 
            'inscrito pibic',
            'cancelado',
            'denegado',
            'ativo',
            'inscrito',
            'reprovado',
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
            'id_aluno' => ['sometimes', 'regex:/^[0-9a-fA-F]{40}$/'],
            'situacao_projeto' => ['sometimes', 'in:' . implode(',', $situacaoOptions)],
            'codigo_departamento' => ['sometimes', 'integer'],
            'nome_departamento' => ['sometimes', 'in:' . implode(',', $dptoOptions)],
            'id_orientador' => ['sometimes', 'regex:/^[0-9a-fA-F]{40}$/'],
            'ano_inicio' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
            'ano_fim' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
        ]);
    }
}
