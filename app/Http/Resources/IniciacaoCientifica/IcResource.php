<?php

namespace App\Http\Resources\IniciacaoCientifica;

use Illuminate\Http\Resources\Json\JsonResource;

class IcResource extends JsonResource
{
    public function toArray($request)
    {
        $bolsas = [];

        foreach ($this->bolsas as $bolsa) {
            $bolsas[] = [
                "sequencia_fomento" => $bolsa->sequencia_fomento,
                "nome_fomento" => $bolsa->nome_fomento,
                "fomento_edital" => $bolsa->fomento_edital,
                "data_inicio_fomento" => $bolsa->data_inicio_fomento,
                "data_fim_fomento" => $bolsa->data_fim_fomento,
            ];
        }

        return [
            "id_projeto" => $this->id_projeto,
            "aluno" => [
                "numero_usp" => $this->aluno->numero_usp,
                "nome" => $this->aluno->nome,
                "data_nascimento" => $this->aluno->data_nascimento,
                "data_falecimento" => $this->aluno->data_falecimento,
                "email" => $this->aluno->email,
                "nacionalidade" => $this->aluno->nacionalidade,
                "cidade_nascimento" => $this->aluno->cidade_nascimento,
                "estado_nascimento" => $this->aluno->estado_nascimento,
                "pais_nascimento" => $this->aluno->pais_nascimento,
                "raca" => $this->aluno->raca,
                "sexo" => $this->aluno->sexo,
                "orientacao_sexual" => $this->aluno->orientacao_sexual,
                "identidade_genero" => $this->aluno->identidade_genero,
                "situacao_vacinal_covid" => $this->aluno->situacao_vacinal_covid,
                "cpf" => $this->aluno->cpf,
            ],
            "situacao_projeto" => $this->situacao_projeto,
            "data_inicio_projeto" => $this->data_inicio_projeto,
            "data_fim_projeto" => $this->data_fim_projeto,
            "ano_projeto" => $this->ano_projeto,
            "codigo_departamento" => $this->codigo_departamento,
            "nome_departamento" => $this->nome_departamento,
            "orientador" => [
                "numero_usp" => $this->orientador->numero_usp,
                "nome" => $this->orientador->nome,
                "data_nascimento" => $this->orientador->data_nascimento,
                "data_falecimento" => $this->orientador->data_falecimento,
                "email" => $this->orientador->email,
                "nacionalidade" => $this->orientador->nacionalidade,
                "cidade_nascimento" => $this->orientador->cidade_nascimento,
                "estado_nascimento" => $this->orientador->estado_nascimento,
                "pais_nascimento" => $this->orientador->pais_nascimento,
                "raca" => $this->orientador->raca,
                "sexo" => $this->orientador->sexo,
                "orientacao_sexual" => $this->orientador->orientacao_sexual,
                "identidade_genero" => $this->orientador->identidade_genero,
                "situacao_vacinal_covid" => $this->orientador->situacao_vacinal_covid,
                "cpf" => $this->orientador->cpf,
            ],
            "titulo_projeto" => $this->titulo_projeto,
            "palavras_chave" => $this->palavras_chave,
            "bolsas" => $bolsas
        ];
    }
}
