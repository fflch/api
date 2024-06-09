<?php

namespace App\Http\Resources\IniciacaoCientifica;

use Illuminate\Http\Resources\Json\JsonResource;

class SiicuspResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_trabalho' => $this->id_trabalho,
            'titulo_trabalho' => $this->titulo_trabalho,
            'id_projeto_ic' => $this->id_projeto_ic,
            'edicao_siicusp' => $this->edicao_siicusp,
            'situacao_inscricao' => $this->situacao_inscricao,
            'situacao_apresentacao' => $this->situacao_apresentacao,
            'participantes' => $this->mapParticipantes(),
            'prox_etapa_recomendado' => $this->prox_etapa_recomendado,
            'prox_etapa_apresentado' => $this->prox_etapa_apresentado,
            'mencao_honrosa' => $this->mencao_honrosa,
            'codigo_dpto_orientador' => $this->codigo_dpto_orientador,
            'nome_dpto_orientador' => $this->nome_dpto_orientador,
        ];
    }

    private function mapParticipantes()
    {
        return $this->participantes->map(function ($participante) {
            return [
                'numero_usp' => $participante->numero_usp,
                'nome_participante' => $participante->nome_participante,
                'tipo_participante' => $participante->tipo_participante,
                'codigo_unidade' => $participante->codigo_unidade,
                'sigla_unidade' => $participante->sigla_unidade,
                'codigo_departamento' => $participante->codigo_departamento,
                'nome_departamento' => $participante->nome_departamento,
                'participante_apresentador' => $participante->participante_apresentador,
            ];
        })->toArray();
    }
}
