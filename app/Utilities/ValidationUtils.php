<?php

namespace App\Utilities;

use App\Utilities\CommonUtils;

class ValidationUtils
{
    public static function getRoles($returnType = 'string')
    {
        $roles = [
            'externo',
            'comissão de pesquisa',
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

    private static function normalizeArrays($array)
    {
        $array = CommonUtils::arrayToLower($array);
        $array = CommonUtils::removeArrayDiacritics($array);

        return implode(',', $array);
    }
}
