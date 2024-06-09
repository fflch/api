<?php

namespace App\Http\Resources\PesquisasAvancadas;

use Illuminate\Http\Resources\Json\JsonResource;

class PesquisadorColabResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id_projeto" => $this->id_projeto,
            "pesquisador" => $this->mapPesquisador(),
            "situacao_projeto" => $this->situacao_projeto,
            "motivo_cancelamento" => $this->motivo_cancelamento,
            "data_inicio_projeto" => $this->data_inicio_projeto,
            "data_fim_projeto" => $this->data_fim_projeto,
            "codigo_departamento" => $this->codigo_departamento,
            "nome_departamento" => $this->nome_departamento,
            "area_cnpq" => $this->area_cnpq,
            "titulo_projeto" => $this->titulo_projeto,
            "palavras_chave" => $this->palavras_chave,
            "periodos" => $this->mapPeriodos(),
            "bolsas" => $this->mapBolsas(),
            "afastamentosEmpresa" => $this->mapAfastamentosEmpresa(),
        ];
    }

    private function mapPesquisador()
    {
        $pesquisador = $this->pesquisador;

        return [
            "numero_usp" => $pesquisador->numero_usp,
            "nome" => $pesquisador->nome,
            "data_nascimento" => $pesquisador->data_nascimento,
            "data_falecimento" => $pesquisador->data_falecimento,
            "email" => $pesquisador->email,
            "nacionalidade" => $pesquisador->nacionalidade,
            "cidade_nascimento" => $pesquisador->cidade_nascimento,
            "estado_nascimento" => $pesquisador->estado_nascimento,
            "pais_nascimento" => $pesquisador->pais_nascimento,
            "raca" => $pesquisador->raca,
            "sexo" => $pesquisador->sexo,
            "orientacao_sexual" => $pesquisador->orientacao_sexual,
            "identidade_genero" => $pesquisador->identidade_genero,
            "situacao_vacinal_covid" => $pesquisador->situacao_vacinal_covid,
            "cpf" => $pesquisador->cpf,
        ];
    }

    private function mapPeriodos()
    {
        return $this->periodos->map(function ($periodo) {
            return [
                "sequencia_periodo" => $periodo->sequencia_periodo,
                "situacao_periodo" => $periodo->situacao_periodo,
                "data_inicio_periodo" => $periodo->data_inicio_periodo,
                "data_fim_periodo" => $periodo->data_fim_periodo,
                "fonte_recurso" => $periodo->fonte_recurso,
                "horas_semanais" => $periodo->horas_semanais,
            ];
        })->toArray();
    }

    private function mapBolsas()
    {
        return $this->bolsas->map(function ($bolsa) {
            return [
                "sequencia_periodo" => $bolsa->sequencia_periodo,
                "sequencia_fomento" => $bolsa->sequencia_fomento,
                "codigo_fomento" => $bolsa->codigo_fomento,
                "nome_fomento" => $bolsa->nome_fomento,
                "data_inicio_fomento" => $bolsa->data_inicio_fomento,
                "data_fim_fomento" => $bolsa->data_fim_fomento,
                "id_fomento" => $bolsa->id_fomento,
            ];
        })->toArray();
    }

    private function mapAfastamentosEmpresa()
    {
        return $this->afastamentosEmpresa->map(function ($afastamento) {
            return [
                "sequencia_periodo" => $afastamento->sequencia_periodo,
                "seq_vinculo_empresa" => $afastamento->seq_vinculo_empresa,
                "nome_empresa" => $afastamento->nome_empresa,
                "data_inicio_afastamento" => $afastamento->data_inicio_afastamento,
                "data_fim_afastamento" => $afastamento->data_fim_afastamento,
                "tipo_vinculo" => $afastamento->tipo_vinculo,
            ];
        })->toArray();
    }
}
