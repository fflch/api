<?php

namespace App\Http\Resources\CulturaExtensao;

use Illuminate\Http\Resources\Json\JsonResource;

class CursoCCExResource  extends JsonResource
{
    public function toArray($request)
    {
        return [
            'codigo_curso_ceu' => $this->codigo_curso_ceu,
            'sigla_unidade' => $this->sigla_unidade,
            'codigo_departamento' => $this->codigo_departamento,
            'nome_departamento' => $this->nome_departamento,
            'modalidade_curso' => $this->modalidade_curso,
            'nome_curso' => $this->nome_curso,
            'oferecimentos' => $this->mapOferecimentos(),
            'tipo' => $this->tipo,
            'codigo_colegiado' => $this->codigo_colegiado,
            'sigla_colegiado' => $this->sigla_colegiado,
            'area_conhecimento' => $this->area_conhecimento,
            'area_tematica' => $this->area_tematica,
            'linha_extensao' => $this->linha_extensao,
        ];
    }

    private function mapOferecimentos()
    {
        return $this->oferecimentos->map(function ($oferecimento) {
            return [
                'codigo_oferecimento' => $oferecimento->codigo_oferecimento,
                'codigo_curso_ceu' => $oferecimento->codigo_curso_ceu,
                'situacao_oferecimento' => $oferecimento->situacao_oferecimento,
                'data_inicio_oferecimento' => $oferecimento->data_inicio_oferecimento,
                'data_fim_oferecimento' => $oferecimento->data_fim_oferecimento,
                'total_carga_horaria' => $oferecimento->total_carga_horaria,
                'qntd_vagas_ofertadas' => $oferecimento->qntd_vagas_ofertadas,
                'curso_pago' => $oferecimento->curso_pago,
                'valor_inscricao_edicao' => $oferecimento->valor_inscricao_edicao,
                'qntd_vagas_gratuitas' => $oferecimento->qntd_vagas_gratuitas,
                'valor_previsto_arrecadacao' => $oferecimento->valor_previsto_arrecadacao,
                'valor_previsto_custos' => $oferecimento->valor_previsto_custos,
                'valor_previsto_prce' => $oferecimento->valor_previsto_prce,
                'curso_para_empresas' => $oferecimento->curso_para_empresas,
                'local_curso' => $oferecimento->local_curso,
                'data_inicio_inscricoes' => $oferecimento->data_inicio_inscricoes,
                'data_fim_inscricoes' => $oferecimento->data_fim_inscricoes,
                'permite_inscricao_online' => $oferecimento->permite_inscricao_online,
            ];
        });
    }
}
