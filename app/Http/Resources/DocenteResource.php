<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocenteResource extends JsonResource
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
            "pessoa" => $this->mapPessoa(),
            "designacoes" => $this->mapDesignacoes(),
        ];
    }

    private function mapPessoa()
    {
        return [
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
        ];
    }

    private function mapDesignacoes()
    {
        return $this->designacoes->map(function ($designacao) {
            return [
                'data_inicio_designacao' => $designacao->data_inicio_designacao,
                'data_fim_designacao' => $designacao->data_fim_designacao,
                'codigo_setor_designacao' => $designacao->codigo_setor_designacao,
                'nome_setor_designacao' => $designacao->nome_setor_designacao,
                'nome_funcao' => $designacao->nome_funcao,
                'tipo_designacao' => $designacao->tipo_designacao,
            ];
        });
    }
}
