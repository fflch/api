----
# API FFLCH – Documentação
----

## API Base URL

#### Client API: https://api.fflch.usp.br/

## Count

### `[GET /public/{endpoint}/count]` Número total de registros

<br> ◾ Retorna apenas o número de registros do endpoint.

<br>

#### Parâmetros

Todos aqueles do endpoint buscado, exceto `page` e `limit`.

-------

#### Resposta

Retorna um objeto JSON com a seguinte propriedade:

- `totalRecords`: Número total de registros encontrados.

------

#### Exemplo

- Request:

<pre>
<code>GET /public/ics/count?<em>nome_departamento</em>=<strong>filosofia</strong>&<em>ano_inicio</em>=<strong>2019</strong>&<em>situacao_projeto</em>=<strong>aprovado</strong></code>
</pre>

- Response:

```json
{
    "total records": 35
}
```


[---------------------------------------------------------------]: #

## Endpoints    
    
### `[GET /public/ics]` Registros de iniciações científicas

<br> ◾ Retorna uma relação com todos os projetos de iniciação científica da FFLCH cadastrados no sistema Atena.

<br>

#### Parâmetros

- `limit` (opcional): Número máximo de registros a ser retornado. Padrão é 100. *[integer]*
- `page` (opcional): Número da página a ser retornada. Padrão é 1. *[integer]*
- `id_projeto` (opcional): Filtra a busca pelo id do projeto. *[ano-codigo]*
- `situacao_projeto` (opcional): Filtra a busca pela situação do projeto. *["Aprovado", "Ativo", "Cancelado", "Denegado", "Inscrito", "Inscrito PIBIC", "Pendente" ou "Reprovado"]*
- `codigo_departamento` (opcional): Filtra a busca pelo código do departamento do projeto (departamento do orientador) *[integer]*
- `nome_departamento` (opcional): Filtra a busca pelo nome do departamento do projeto (departamento do orientador). *["Antropologia", "Ciência Política", "Filosofia", "Geografia", "História", "Letras Clássicas e Vernáculas", "Letras Modernas", "Letras Orientais", "Linguística", "Sociologia", "Teoria Literária e Literatura Comparada"]*
- `ano_inicio` (opcional): Filtra a busca pelo ano inicial do projeto. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_fim` (opcional): Filtra a busca pelo ano final do projeto.  *[(gt|lt|gte|lte)ano]* (ex. gte2021)

-------

#### Resposta

Retorna um objeto JSON com as seguintes propriedades:

- `totalRecords`: Número total de registros encontrados.
- `page`: Número da página solicitada.
- `limit`: Número de registros solicitados por página.
- `displayingRecords`: Intervalo de registros que estão sendo exibidos.
- `records`: Array contendo os registros, cada um com as seguintes propriedades:
    - `id_projeto`: Identificador único do projeto;
    - `numero_usp`: Número USP do aluno (hashed);
    - `situacao_projeto`: Situação do projeto;
    - `ano_projeto`: Ano de referência do projeto;
    - `codigo_departamento`: Código do departamento do orientador do projeto;
    - `nome_departamento`: Nome do departamento do orientador do projeto;
    - `numero_usp_orientador`: Número USP do orientador do projeto (hashed);
    - `data_inicio_projeto`: Data de início do projeto;
    - `data_fim_projeto`: Data de término do projeto;
    - `titulo_projeto`: Título do projeto;
    - `palavras_chave`: Palavras-chave do projeto;

------

#### Exemplo

- Request:

<pre>
<code>GET /public/ics?<em>limit</em>=<strong>5</strong>&<em>page</em>=<strong>4</strong>&<em>situacao_projeto</em>=<strong>ativo</strong></code>
</pre>

- Response:

```json
{
    "totalRecords": 367,
    "page": 4,
    "limit": 5,
    "displayingRecords": "16-20",
    "records": [
        {
            "id_projeto": "2023-1171",
            "numero_usp": "17BA564D1C36F312",
            "situacao_projeto": "Ativo",
            "ano_projeto": 2023,
            "codigo_departamento": 592,
            "nome_departamento": "Letras Clássicas e Vernáculas",
            "numero_usp_orientador": "B5A5FD5DE49804C6",
            "data_inicio_projeto": "2023-09-01",
            "data_fim_projeto": "2024-08-31",
            "titulo_projeto": "VOCABULÁRIO DO FILOLOGIA BANDEIRANTE",
            "palavras_chave": "PORTUGUÊS DO BRASIL; DIALETO CAIPIRA"
        },
        ...
    ]
}
```

<br><br>

[---------------------------------------------------------------]: # 

### `[GET /public/posdocs]` Registros de projetos de pós-doutorado

<br> ◾ Retorna uma relação com todos os projetos de pós-doutorado da FFLCH cadastrados no sistema Atena.

<br>

#### Parâmetros

- `limit` (opcional): Número máximo de registros a ser retornado. Padrão é 100. *[integer]*
- `page` (opcional): Número da página a ser retornada. Padrão é 1. *[integer]*
- `id_projeto` (opcional): Filtra a busca pelo id do projeto. *[ano-codigo]*
- `situacao_projeto` (opcional): Filtra a busca pela situação do projeto. *["Aprovado", "Ativo", "Cancelado", "Encerrado", "Incompleto", "Inscrito", "Recusado" ou "Reprovado"]*
- `codigo_departamento` (opcional): Filtra a busca pelo código do departamento do projeto *[integer]*
- `nome_departamento` (opcional): Filtra a busca pelo nome do departamento do projeto (departamento do orientador). *["Antropologia", "Ciência Política", "Filosofia", "Geografia", "História", "Letras Clássicas e Vernáculas", "Letras Modernas", "Letras Orientais", "Linguística", "Sociologia", "Teoria Literária e Literatura Comparada"]*
- `ano_inicio` (opcional): Filtra a busca pelo ano inicial do projeto. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_fim` (opcional): Filtra a busca pelo ano final do projeto.  *[(gt|lt|gte|lte)ano]* (ex. gte2021)

-------

#### Resposta

Retorna um objeto JSON com as seguintes propriedades:

- `totalRecords`: Número total de registros encontrados.
- `page`: Número da página solicitada.
- `limit`: Número de registros solicitados por página.
- `displayingRecords`: Intervalo de registros que estão sendo exibidos.
- `records`: Array contendo os registros, cada um com as seguintes propriedades:
    - `id_projeto`: Identificador único do projeto.
    - `numero_usp`: Número USP do aluno (hashed);
    - `situacao_projeto`: Situação do projeto;
    - `codigo_departamento`: Código do departamento do orientador do projeto;
    - `nome_departamento`: Nome do departamento do orientador do projeto;
    - `data_inicio_projeto`: Data de início do projeto;
    - `data_fim_projeto`: Data de término do projeto;
    - `numero_usp_supervisor`: Número USP do supervisor do projeto (hashed);
    - `titulo_projeto`: Título do projeto;
    - `area_cnpq`: Área CNPQ do projeto;
    - `palavras_chave`: Palavras-chave do projeto;

------

#### Exemplo

- Request:

<pre>
<code>GET /public/posdocs?<em>id_projeto</em>=<strong>2008-131</strong></code>
</pre>

- Response:

```json
{
    "totalRecords": 1,
    "page": 1,
    "limit": 100,
    "displayingRecords": "1-1",
    "records": [
        {
            "id_projeto": "2008-131",
            "numero_usp": "0727CEB523C1321D",
            "situacao_projeto": "Aprovado",
            "codigo_departamento": 596,
            "nome_departamento": "Geografia",
            "data_inicio_projeto": "2008-01-01",
            "data_fim_projeto": "2008-12-31",
            "numero_usp_supervisor": "9B1EBFEFB6744E9C",
            "titulo_projeto": "DICIONÁRIO DOS GEÓGRAFOS BRASILEIROS (DGB)",
            "area_cnpq": null,
            "palavras_chave": null
        }
    ]
}
```

<br><br>

[---------------------------------------------------------------]: # 

### `[GET /public/pcs]` Registros de projetos de pesquisadores colaboradores

<br> ◾ Retorna uma relação com todos os projetos de pesquisadores colaboradores da FFLCH cadastrados no sistema Atena.

<br>

#### Parâmetros

- `limit` (opcional): Número máximo de registros a ser retornado. Padrão é 100. *[integer]*
- `page` (opcional): Número da página a ser retornada. Padrão é 1. *[integer]*
- `id_projeto` (opcional): Filtra a busca pelo id do projeto. *[ano-codigo]*
- `situacao_projeto` (opcional): Filtra a busca pela situação do projeto. *["Aprovado", "Ativo", "Cancelado", "Encerrado", "Incompleto", "Inscrito", "Recusado" ou "Reprovado"]*
- `codigo_departamento` (opcional): Filtra a busca pelo código do departamento do projeto *[integer]*
- `nome_departamento` (opcional): Filtra a busca pelo nome do departamento do projeto (departamento do orientador). *["Antropologia", "Ciência Política", "Filosofia", "Geografia", "História", "Letras Clássicas e Vernáculas", "Letras Modernas", "Letras Orientais", "Linguística", "Sociologia", "Teoria Literária e Literatura Comparada"]*
- `ano_inicio` (opcional): Filtra a busca pelo ano inicial do projeto. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_fim` (opcional): Filtra a busca pelo ano final do projeto.  *[(gt|lt|gte|lte)ano]* (ex. gte2021)

-------

#### Resposta

Retorna um objeto JSON com as seguintes propriedades:

- `totalRecords`: Número total de registros encontrados.
- `page`: Número da página solicitada.
- `limit`: Número de registros solicitados por página.
- `displayingRecords`: Intervalo de registros que estão sendo exibidos.
- `records`: Array contendo os registros, cada um com as seguintes propriedades:
    - `id_projeto`: Identificador único do projeto.
    - `numero_usp`: Número USP do aluno (hashed);
    - `situacao_projeto`: Situação do projeto;
    - `codigo_departamento`: Código do departamento do orientador do projeto;
    - `nome_departamento`: Nome do departamento do orientador do projeto;
    - `data_inicio_projeto`: Data de início do projeto;
    - `data_fim_projeto`: Data de término do projeto;
    - `titulo_projeto`: Título do projeto;
    - `area_cnpq`: Área CNPQ do projeto;
    - `palavras_chave`: Palavras-chave do projeto;

------

#### Exemplo

- Request:

<pre>
<code>GET /public/pcs?<em>ano_fim</em>=<strong>2019</strong>&<em>limit</em>=<strong>10</strong></code>
</pre>

- Response:

```json
{
    "totalRecords": 15,
    "page": 1,
    "limit": 10,
    "displayingRecords": "1-10",
    "records": [
        {
            "id_projeto": "2021-10093",
            "numero_usp": "7CE54F7A4223536E",
            "situacao_projeto": "Aprovado",
            "codigo_departamento": 592,
            "nome_departamento": "Letras Clássicas e Vernáculas",
            "data_inicio_projeto": "2018-01-02",
            "data_fim_projeto": "2019-12-31",
            "titulo_projeto": "DOM CASMURRO E UMA TRADIÇÃO DE CORAÇÕES...",
            "area_cnpq": "Literatura Brasileira",
            "palavras_chave": "MACHADO ASSIS; ROMANCE; PROBLEMA"
        },
        ...
    ]
}
```

<br><br>

[---------------------------------------------------------------]: # 

### `[GET /public/defesas]` Registros de defesas de pós-graduação

<br> ◾ Retorna uma relação com todas as defesas de pós-graduação de alunos da FFLCH cadastradas no sistema Janus.

<br>

#### Parâmetros

- `limit` (opcional): Número máximo de registros a ser retornado. Padrão é 100. *[integer]*
- `page` (opcional): Número da página a ser retornada. Padrão é 1. *[integer]*
- `id_defesa` (opcional): Filtra a busca pelo id da defesa. *[string(32)]*
- `id_posgraduacao` (opcional): Filtra a busca pelo id da pós-graduação do aluno. *[string(32)]*
- `nivel_programa` (opcional): Filtra a busca pelo nível do programa de pós-graduação *["ME", "DO" ou "DD"]*
- `codigo_area` (opcional): Filtra a busca pelo código dá área da pós-graduação *[integer]*
- `codigo_programa` (opcional): Filtra a busca pelo código do programa da pós-graduação *[integer]*
- `mencao_honrosa` (opcional): Filtra a busca por menção honrosa recebida na defesa. *["Distinção", "Distinção e Louvor" ou ""]*
- `ano_defesa` (opcional): Filtra a busca pelo ano da defesa. *[(gt|lt|gte|lte)ano]* (ex. gte2021)

-------

#### Resposta

Retorna um objeto JSON com as seguintes propriedades:

- `totalRecords`: Número total de registros encontrados.
- `page`: Número da página solicitada.
- `limit`: Número de registros solicitados por página.
- `displayingRecords`: Intervalo de registros que estão sendo exibidos.
- `records`: Array contendo os registros, cada um com as seguintes propriedades:
    - `id_defesa`: Identificador único da defesa.
    - `numero_usp`: Número USP do aluno (hashed);
    - `id_posgraduacao`: Identificador único da pós-graduação;
    - `nivel_programa`: Nível da pós-graduação;
    - `codigo_area`: Código da área da pós-graduação;
    - `nome_area`: Nome da área da pós-graduação;
    - `codigo_programa`: Código do programa da pós-graduação;
    - `nome_programa`: Nome do programa da pós-graduação;
    - `data_defesa`: Data da defesa;
    - `local_defesa`: Local da defesa;
    - `mencao_honrosa`: Menção honrosa recebida na defesa;
    - `titulo_trabalho`: Título do trabalho defendido;

------

#### Exemplo

- Request:

<pre>
<code>GET /public/defesas?<em>nivel_programa</em>=<strong>dd</strong>&<em>codigo_area</em>=<strong>8137</strong>&<em>ano_defesa</em>=<strong>gte2019</strong></code>
</pre>

- Response:

```json
{
    "totalRecords": 4,
    "page": 1,
    "limit": 100,
    "displayingRecords": "1-4",
    "records": [
        {
            "id_defesa": "1E110E845CA13595B30CB935E151A785",
            "numero_usp": "690ADFA5A7E7E013",
            "id_posgraduacao": "70AC5B61A891B165176487FCA98F4284",
            "nivel_programa": "Doutorado Direto",
            "codigo_area": 8137,
            "nome_area": "História Econômica",
            "codigo_programa": 8009,
            "nome_programa": "História Econômica",
            "data_defesa": "2020-04-13",
            "local_defesa": "À DISTÂNCIA",
            "mencao_honrosa": null,
            "titulo_trabalho": "O ALLIANZ PARQUE NA ECONOMIA DO FUTEBOL..."
        },
        ...
    ]
}
```

<br><br>

[---------------------------------------------------------------]: # 

### `[GET /public/vinculos/docentes]` Registros de vínculos de docentes

<br> ◾ Retorna uma relação com todos os docentes da FFLCH.

<br>

#### Parâmetros

- `limit` (opcional): Número máximo de registros a ser retornado. Padrão é 100. *[integer]*
- `page` (opcional): Número da página a ser retornada. Padrão é 1. *[integer]*
- `id_vinculo` (opcional): Filtra a busca pelo id do vínculo. *[string(32)]*
- `codigo_ultimo_setor` (opcional): Filtra a busca pelo código do último setor (ou o atual) do docente. *[integer]*
- `nome_ultimo_setor` (opcional): Filtra a busca pelo nome do último setor (ou o atual) do docente. *[string]*
- `classe` (opcional): Filtra a busca pela classe do vínculo do docente. *[string]*
- `referencia` (opcional): Filtra a busca pela referência do vínculo do docente. *[string]*
- `tipo_jornada` (opcional): Filtra a busca pelo tipo de jornada do vínculo do docente. *[string]*
- `ano_fim_vinculo` (opcional): Filtra a busca pelo ano final do vínculo do docente. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_ultima_ocorrencia` (opcional): Filtra a busca pelo ano da última ocorrência relacionada ao vínculo do docente. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_ultima_alteracao_funcional` (opcional): Filtra a busca pelo ano da última alteração funcional do vínculo do docente. *[(gt|lt|gte|lte)ano]* (ex. gte2021)

-------

#### Resposta

Retorna um objeto JSON com as seguintes propriedades:

- `warning`: Aviso sobre possível inconsistẽncia dos dados.
- `totalRecords`: Número total de registros encontrados.
- `page`: Número da página solicitada.
- `limit`: Número de registros solicitados por página.
- `displayingRecords`: Intervalo de registros que estão sendo exibidos.
- `records`: Array contendo os registros, cada um com as seguintes propriedades:
    - `id_vinculo`: Identificador único do docente;
    - `numero_usp`: Número USP do aluno (hashed);
    - `situacao_atual`: Situação atual do vínculo;
    - `data_fim_vinculo`: Data de encerramento do vínculo;
    - `codigo_ultimo_setor`: Código do último setor do vínculo;
    - `nome_ultimo_setor`: Nome do último setor do vínculo;
    - `classe`: Classe do vínculo;
    - `referencia`: Referência do vínculo;
    - `tipo_jornada`: Tipo de jornada do vínculo;
    - `data_ultima_alteracao_funcional`: Data da última alteração funcional do vínculo;
    - `data_ultima_ocorrencia`: Data da última ocorrência relacionada ao vínculo;

------

#### Exemplo

- Request:

<pre>
<code>GET /public/vinculos/docentes?<em>referencia</em>=<strong>MS-6</strong>&<em>nome_ultimo_setor</em>=<strong>filosofia</strong></code>
</pre>

- Response:

```json
{
    "warning": "...",
    "totalRecords": 21,
    "page": 1,
    "limit": 100,
    "displayingRecords": "1-21",
    "records": [
        {
            "id_vinculo": "0342D940C970B0A62B531D906A1BC1E4",
            "numero_usp": "181EA3AB54CB2C43",
            "situacao_atual": "Aposentado",
            "data_fim_vinculo": null,
            "codigo_ultimo_setor": 594,
            "nome_ultimo_setor": "Filosofia",
            "classe": "Prof Titular",
            "referencia": "MS-6",
            "tipo_jornada": "RDIDP",
            "data_ultima_alteracao_funcional": "2006-06-27",
            "data_ultima_ocorrencia": "2019-07-01"
        },
        ...
    ]
}
```

<br><br>

[---------------------------------------------------------------]: # 

### `[GET /public/vinculos/funcionarios]` Registros de vínculos de funcionários

<br> ◾ Retorna uma relação com todos os funcionários da FFLCH.

<br>

#### Parâmetros

- `limit` (opcional): Número máximo de registros a ser retornado. Padrão é 100. *[integer]*
- `page` (opcional): Número da página a ser retornada. Padrão é 1. *[integer]*
- `id_vinculo` (opcional): Filtra a busca pelo id do vínculo. *[string(32)]*
- `situacao_atual`(opcional): Filtra a busca pela situação atual do vínculo do funcionário. *[”Aposentado”, “Ativo” ou “Desativado”]*
- `codigo_ultimo_setor` (opcional): Filtra a busca pelo código do último setor (ou o atual) do funcionário. *[integer]*
- `nome_ultimo_setor` (opcional): Filtra a busca pelo nome do último setor (ou o atual) do funcionário. *[string]*
- `ambito_funcao` (opcional): Filtra a busca pelo âmbito da função do vínculo. *[string]*
- `classe` (opcional): Filtra a busca pela classe do vínculo do funcionário. *[string]*
- `referencia` (opcional): Filtra a busca pela referência do vínculo do docente. *[string]*
- `tipo_jornada` (opcional): Filtra a busca pelo tipo de jornada do vínculo do funcionário. *[string]*
- `tipo_ingresso` (opcional): Filtra a busca pelo tipo de ingresso do funcionário naquele vínculo; *[”anterior a out/2002”, “comissionado”, “concurso público”, “processo seletivo”, “reintegração”]*
- `ano_fim_vinculo` (opcional): Filtra a busca pelo ano final do vínculo do funcionário. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_ultima_ocorrencia` (opcional): Filtra a busca pelo ano da última ocorrência relacionada ao vínculo do funcionário. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_ultima_alteracao_funcional` (opcional): Filtra a busca pelo ano da última alteração funcional do vínculo do funcionário. *[(gt|lt|gte|lte)ano]* (ex. gte2021)

-------

#### Resposta

Retorna um objeto JSON com as seguintes propriedades:

- `warning`: Aviso sobre possível inconsistẽncia dos dados.
- `totalRecords`: Número total de registros encontrados.
- `page`: Número da página solicitada.
- `limit`: Número de registros solicitados por página.
- `displayingRecords`: Intervalo de registros que estão sendo exibidos.
- `records`: Array contendo os registros, cada um com as seguintes propriedades:
    - `id_vinculo`: Identificador único do vínculo;
    - `numero_usp`: Número USP do funcionário (hashed);
    - `situacao_atual`: Situação atual do vínculo;
    - `data_fim_vinculo`: Data de encerramento do vínculo;
    - `codigo_ultimo_setor`: Código do último setor do vínculo;
    - `nome_ultimo_setor`: Nome do último setor do vínculo;
    - `ambito_funcao`: Âmbito da função do funcionário;
    - `classe`: Classe do vínculo;
    - `referencia`: Referência do vínculo;
    - `tipo_jornada`: Tipo de jornada do vínculo;
    - `tipo_ingresso`: Tipo de ingresso do funcionário naquele vínculo;
    - `data_ultima_alteracao_funcional`: Data da última alteração funcional do vínculo;
    - `data_ultima_ocorrencia`: Data da última ocorrência relacionada ao vínculo;

------

#### Exemplo

- Request:

<pre>
<code>GET /public/vinculos/funcionarios?<em>situacao_atual</em>=<strong>ativo</strong>&<em>codigo_ultimo_setor</em>=<strong>564</strong></code>
</pre>

- Response:

```json
{
    "warning": "...",
    "totalRecords": 5,
    "page": 1,
    "limit": 100,
    "displayingRecords": "1-5",
    "records": [
        {
            "id_vinculo": "0103392CB0C82E149FFA746EEAA53177",
            "numero_usp": "EC184782252AA6AA",
            "situacao_atual": "Ativo",
            "data_fim_vinculo": null,
            "codigo_ultimo_setor": 564,
            "nome_ultimo_setor": "Seção de Alunos de Letras",
            "ambito_funcao": "Acadêmica",
            "classe": "Técnico 2",
            "referencia": "C",
            "tipo_jornada": "40 Horas",
            "tipo_ingresso": "anterior a out/2002",
            "data_ultima_alteracao_funcional": "2012-11-21",
            "data_ultima_ocorrencia": null
        },
        ...
    ]
}
```

<br><br>

[---------------------------------------------------------------]: # 

### `[GET /public/vinculos/estagiarios]` Registros de vínculos de estagiários

<br> ◾ Retorna uma relação com todos os estagiários da FFLCH.

<br>

#### Parâmetros

- `limit` (opcional): Número máximo de registros a ser retornado. Padrão é 100. *[integer]*
- `page` (opcional): Número da página a ser retornada. Padrão é 1. *[integer]*
- `id_vinculo` (opcional): Filtra a busca pelo id do vínculo. *[string(32)]*
- `situacao_atual`(opcional): Filtra a busca pela situação atual do vínculo do estagiário. *[”Aposentado”, “Ativo” ou “Desativado”]*
- `codigo_ultimo_setor` (opcional): Filtra a busca pelo código do último setor (ou o atual) do estagiário. *[integer]*
- `nome_ultimo_setor` (opcional): Filtra a busca pelo nome do último setor (ou o atual) do estagiário. *[string]*
- `classe` (opcional): Filtra a busca pela classe do vínculo do estagiário. *[string]*
- `tipo_jornada` (opcional): Filtra a busca pelo tipo de jornada do vínculo do estagiário. *[string]*
- `ultima_ocorrencia` (opcional): Filtra a busca pela última ocorrência relacionada ao vínculo. *[string]*
- `ano_inicio_vinculo` (opcional): Filtra pelo ano de ínicio do vínculo do estagiário. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_ultima_ocorrencia` (opcional): Filtra a busca pelo ano da última ocorrência relacionada ao vínculo do estagiário. *[(gt|lt|gte|lte)ano]* (ex. gte2021)
- `ano_ultima_ocorrencia` (opcional): Filtra a busca pelo ano da última ocorrência relacionada ao vínculo do estagiário. *[(gt|lt|gte|lte)ano]* (ex. gte2021)

-------

#### Resposta

Retorna um objeto JSON com as seguintes propriedades:

- `warning`: Aviso sobre possível inconsistẽncia dos dados.
- `totalRecords`: Número total de registros encontrados.
- `page`: Número da página solicitada.
- `limit`: Número de registros solicitados por página.
- `displayingRecords`: Intervalo de registros que estão sendo exibidos.
- `records`: Uma matriz de objetos de livros, cada um com as seguintes propriedades:
    - `id_vinculo`: Identificador único do vínculo;
    - `numero_usp`: Número USP do estagiário (hashed);
    - `situacao_atual`: Situação atual do vínculo;
    - `data_inicio_vinculo`: Data de início do vínculo;
    - `data_fim_vinculo`: Data de encerramento do vínculo;
    - `codigo_ultimo_setor`: Código do último setor do vínculo;
    - `nome_ultimo_setor`: Nome do último setor do vínculo;
    - `classe`: Classe do vínculo;
    - `tipo_jornada`: Tipo de jornada do vínculo;
    - `ultima_ocorrencia`: Última ocorrência relacionada ao vínculo;
    - `data_ultima_ocorrencia`: Data da última ocorrência relacionada ao vínculo;

------

#### Exemplo

- Request:

<pre>
<code>GET /public/vinculos/estagiarios?<em>ano_inicio_vinculo</em>=<strong>2021</strong></code>
</pre>

- Response:

```json
{
    "warning": "...",
    "totalRecords": 56,
    "page": 1,
    "limit": 100,
    "displayingRecords": "1-56",
    "records": [
        {
            "id_vinculo": "029F5E63FF041010271E148583241EF8",
            "numero_usp": "9B91E58990FA8D8F",
            "situacao_atual": "Desativado",
            "data_inicio_vinculo": "2021-05-03",
            "data_fim_vinculo": "2023-02-23",
            "codigo_ultimo_setor": 617,
            "nome_ultimo_setor": "Serviço de Comunicação Social",
            "classe": "Estagiário",
            "tipo_jornada": "30 Horas",
            "ultima_ocorrencia": "Cessação antes do prazo",
            "data_ultima_ocorrencia": "2023-02-23"
        },
        ...
    ]
}
```

<br><br>

[---------------------------------------------------------------]: # 