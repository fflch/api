<?php

namespace App\Http\Requests;

use App\Utilities\ValidationUtils;

class FuncionariosRequest extends PaginationRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'id_vinculo' => ['sometimes', 'regex:/^[0-9a-fA-F]{8}$/'],
            'id_estagiario' => ['sometimes', 'regex:/^[0-9a-fA-F]{32}$/'],
            'situacao_atual' => ['sometimes', 'in:' . ValidationUtils::getServidoresSituacoes()],
            'codigo_ultimo_setor' => ['sometimes', 'integer'],
            'nome_ultimo_setor' => ['sometimes', 'regex:/^[\p{L}]*$/u'],
            'ambito_funcao' => ['sometimes', 'regex:/^[\p{L}0-9\-\/]*$/u'],
            'classe' => ['sometimes', 'regex:/^[\p{L}0-9\-]*$/u'],
            'referencia' => ['sometimes', 'regex:/^[\p{L}0-9\-]*$/u'],
            'tipo_jornada' => ['sometimes', 'regex:/^[\p{L}0-9]*$/u'],
            'tipo_ingresso' => ['sometimes', 'in:' . ValidationUtils::getServidoresTiposIngresso()],
            'ultima_ocorrencia' => ['sometimes', 'regex:/^[\p{L}0-9\-()]*$/u'],

            'ano_inicio_vinculo' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
            'ano_fim_vinculo' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
            'ano_ultima_ocorrencia' =>['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
            'ano_ultima_alteracao_funcional' =>['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
        ]);
    }
}