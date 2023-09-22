<?php

namespace App\Utilities;

class ValidationUtils
{
    /*
        NO CAPS
        NO DIACRITICS
    */

    public static function getDptoOptions()
    {
        return implode(',',
            [
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
            ]
        );
    }

    public static function getICSituacoesOptions()
    {
        return implode(',',
            [
                'pendente', 
                'aprovado', 
                'inscrito pibic',
                'cancelado',
                'denegado',
                'ativo',
                'inscrito',
                'reprovado',
            ]
        );
    }

    public static function getPASituacoesOptions()
    {
        return implode(',',
            [
                'aprovado',
                'cancelado',
                'reprovado',
                'encerrado',
                'inscrito',
                'ativo',
                'incompleto',
                'recusado',
            ]
        );
    }

    public static function getPGMencoes()
    {
        return implode(',',
            [
                'distincao',
                'distincao e louvor'
            ]
        );
    }

    public static function getServidoresSituacoes()
    {
        return implode(',',
            [
                'desativado',
                'ativo',
                'aposentado'
            ]
        );
    }

    public static function getServidoresTiposIngresso()
    {
        return implode(',',
            [
                'concurso publico',
                'reintegracao',
                'anterior a out/2002',
                'comissionado',
                'processo seletivo'
            ]
        );
    }
}