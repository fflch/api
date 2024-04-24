<?php

namespace App\Utilities;

use App\Utilities\CommonUtils;

class ValidationUtils
{
    public static function getEndpointColumnsAsString($endpointMap)
    {
        return implode(
            ',',
            array_values($endpointMap['columns'])
        );
    }

    public static function assembleFiltersValidationRules($filters, $prefix = null)
    {
        $filtersRules = [];

        foreach ($filters as $filterName => $filterInfo) {
            $validationRule = $filterInfo['validation'];

            $prefixedFilterName = is_null($prefix)
                ? "filters.$filterName"
                : "filters.$prefix.$filterName";

            $filtersRules["$prefixedFilterName.*"] =
                ['sometimes', ...(is_array($validationRule)
                    ? $validationRule
                    : [$validationRule]
                )];
        }

        return $filtersRules;
    }

    public static function hashValidation($hashLength)
    {
        return "regex:/^[0-9a-fA-F]{{$hashLength}}$/";
    }

    public static function stringValidation()
    {
        return "regex:/^[a-zA-Z0-9\- .]*$/";
    }

    public static function yearValidation()
    {
        return "regex:/^((gt|lt|gte|lte)\d{1,4}$|\d{1,4})$/";
    }

    public static function getRoles($returnType = 'string')
    {
        $roles = [
            'externo',
        ];

        if ($returnType == 'array') {
            return $roles;
        }

        return implode(
            ',',
            $roles
        );
    }

    public static function getDptoOptions()
    {
        return self::normalizeArrays(
            [
                'Antropologia',
                'Ciência Política',
                'Filosofia',
                'Geografia',
                'História',
                'Letras Clássicas e Vernáculas',
                'Letras Modernas',
                'Letras Orientais',
                'Lingüística',
                'Sociologia',
                'Teoria Literária e Literatura Comparada',
            ]
        );
    }

    public static function getICSituacoesOptions()
    {
        return self::normalizeArrays(
            [
                'Aprovado',
                'Ativo',
                'Cancelado',
                'Denegado',
                'Inscrito',
                'Inscrito PIBIC',
                'Pendente',
                'Reprovado',
            ]
        );
    }

    public static function getPASituacoesOptions()
    {
        return self::normalizeArrays(
            [
                'Aprovado',
                'Ativo',
                'Cancelado',
                'Encerrado',
                'Incompleto',
                'Inscrito',
                'Recusado',
                'Reprovado',
            ]
        );
    }

    public static function getPGMencoes()
    {
        return self::normalizeArrays(
            [
                'DISTINÇÃO',
                'DISTINÇÃO E LOUVOR'
            ]
        );
    }

    public static function getServidoresSituacoes()
    {
        return self::normalizeArrays(
            [
                'Aposentado',
                'Ativo',
                'Desativado',
            ]
        );
    }

    public static function getServidoresTiposIngresso()
    {
        return self::normalizeArrays(
            [
                'anterior a out/2002',
                'comissionado',
                'concurso público',
                'processo seletivo',
                'reintegração',
            ]
        );
    }

    public static function getNiveisPrograma()
    {
        return self::normalizeArrays(
            [
                'ME',
                'DO',
                'DD',
                'Mestrado',
                'Doutorado',
                'Doutorado Direto',
            ]
        );
    }

    public static function getRacas()
    {
        return self::normalizeArrays(
            [
                'Não informada',
                'Branca',
                'DD',
                'Mestrado',
                'Doutorado',
                'Doutorado Direto',
            ]
        );
    }

    public static function getOrientSexual()
    {
        return self::normalizeArrays(
            [
                'Prefiro não informar',
                'Bissexual',
                'Heterossexual',
                'Homossexual',
                'Pansexual',
                'Não sei',
                'Outro',
            ]
        );
    }

    public static function getIdGenero()
    {
        return self::normalizeArrays(
            [
                'Prefiro não informar',
                'Mulher cisgênero',
                'Mulher transgênero',
                'Homem cisgênero',
                'Homem transgênero',
                'Não Binário',
                'Outro',
                'Travesti',
            ]
        );
    }

    private static function normalizeArrays($array)
    {
        $array = CommonUtils::arrayToLower($array);
        $array = CommonUtils::removeArrayDiacritics($array);

        return implode(',', $array);
    }
}
