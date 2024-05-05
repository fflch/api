<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstagiarioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id_vinculo" => $this->id_vinculo,
            "numero_usp" => $this->numero_usp,
            "situacao_atual" => $this->situacao_atual,
            "data_inicio_vinculo" => $this->data_inicio_vinculo,
            "data_fim_vinculo" => $this->data_fim_vinculo,
            "cod_ultimo_setor" => $this->cod_ultimo_setor,
            "nome_ultimo_setor" => $this->nome_ultimo_setor,
            "ambito_funcao" => $this->ambito_funcao,
            "classe" => $this->classe,
            "referencia" => $this->referencia,
            "tipo_jornada" => $this->tipo_jornada,
            "tipo_ingresso" => $this->tipo_ingresso,
            "data_ultima_alteracao_funcional" => $this->data_ultima_alteracao_funcional,
            "ultima_ocorrencia" => $this->ultima_ocorrencia,
            "data_inicio_ultima_ocorrencia" => $this->data_inicio_ultima_ocorrencia,
            "pessoa" => [
                "nome" => $this->pessoa->nome,
                "data_nascimento" => $this->pessoa->data_nascimento,
                "data_falecimento" => $this->pessoa->data_falecimento,
                "email" => $this->pessoa->email,
                "nacionalidade" => $this->pessoa->nacionalidade,
                "cidade_nascimento" => $this->pessoa->cidade_nascimento,
                "estado_nascimento" => $this->pessoa->estado_nascimento,
                "pais_nascimento" => $this->pessoa->pais_nascimento,
                "raca" => $this->pessoa->raca,
                "sexo" => $this->pessoa->sexo,
                "orientacao_sexual" => $this->pessoa->orientacao_sexual,
                "identidade_genero" => $this->pessoa->identidade_genero,
                "situacao_vacinal_covid" => $this->pessoa->situacao_vacinal_covid,
                "cpf" => $this->pessoa->cpf,
            ]
        ];
    }
}
