# Registros de projetos de iniciação científica

Retorna uma relação com os projetos de iniciação científica da FFLCH cadastrados no sistema Atena.

# `GET iniciacao-cientifica/projetos`

## Requisição

Para personalizar a consulta, o usuário pode incluir um corpo JSON opcional na requisição com os seguintes parâmetros: `pagination`, `columns` e `filters`.


### *Paginação*

O objeto `pagination` permite a paginação dos registros e pode incluir os seguintes parâmetros:

- `page`: *(int)* Define o número da página desejada. Padrão é 1.
- `limit`: *(int)* O número de registros a serem retornados por página. Padrão é 100.

### *Colunas*
O objeto `columns` permite que o usuário solicite apenas campos específicos dos registros. Para isso, é necessário reconstruir parcialmente o response, seguindo a estrutura original, mas incluindo apenas as chaves desejadas, atribuindo-lhes o valor `1` (vide [exemplo](#exemplo)). O usuário pode escolher qualquer chave ou subchave dos dados aos quais tem acesso. Se o parâmetro `columns` não for utilizado, todas as chaves autorizadas serão retornadas.

### *Filtros*
O objeto `filters` permite ao usuário filtrar sua consulta com base em critérios específicos. Para isso, é necessário passar às chaves os valores que devem ser utilizados como filtro, seguindo a estrutura original do response (vide [exemplo](#exemplo)). Se o parâmetro `filters` não for utilizado, todos os registros serão retornados.

## Resposta

O *response* é um objeto JSON que inclui os seguintes campos:

[Observação: campos marcados como 'restrito' são visíveis apenas para usuários com os privilégios adequados]

- `total_records`: O número total de registros que correspondem à solicitação.
- `current_page`: O número da página atual.
- `per_page`: O número de registros por página.
- `first_item`: O primeiro item na página atual.
- `last_item`: O último item na página atual.
- `data`: Uma matriz de objetos, cada um representando um projeto de iniciação científica.
Cada objeto na matriz data inclui:
    - `id_projeto`: O identificador único do projeto.
    - `aluno`: Um objeto que representa o aluno do projeto.
        - `numero_usp` ***<u>(restrito)</u>***: O número USP do aluno.
        - `nome` ***<u>(restrito)</u>***: O nome do aluno.
        - `data_nascimento`: ***<u>(restrito)</u>***: Data de nascimento do aluno.
        - `data_falecimento`: ***<u>(restrito)</u>***: Data de falecimento do aluno.
        - `email`: ***<u>(restrito)</u>***: E-mail aluno.
        - `nacionalidade`: A nacionalidade do aluno.
        - `cidade_nascimento`: ***<u>(restrito)</u>***: Cidade de nascimento do aluno.
        - `estado_nascimento`: O estado de nascimento do aluno.
        - `pais_nascimento`: O país de nascimento do aluno.
        - `raca`: A raça do aluno.
        - `sexo`: O sexo do aluno.
        - `orientacao_sexual`: ***<u>(restrito)</u>*** Orientação sexual do aluno.
        - `identidade_genero`: ***<u>(restrito)</u>*** Identidade de gênero do aluno.
        - `cpf`: ***<u>(restrito)</u>*** CPF do aluno.
    - `situacao_projeto`: A situação atual do projeto.
    - `data_inicio_projeto`: A data de início do projeto.
    - `data_fim_projeto`: A data de término do projeto.
    - `ano_projeto`: O ano de registro do projeto.
    - `codigo_departamento`: O código do departamento.
    - `nome_departamento`: O nome do departamento.
    - `orientador`: Um objeto que representa o orientador do aluno.
        - `numero_usp` ***<u>(restrito)</u>***: O número USP do orientador.
        - `nome` ***<u>(restrito)</u>***: O nome do orientador.
        - `data_nascimento`: ***<u>(restrito)</u>***: Data de nascimento do orientador.
        - `data_falecimento`: ***<u>(restrito)</u>***: Data de falecimento do orientador.
        - `email`: ***<u>(restrito)</u>***: E-mail orientador.
        - `nacionalidade`: A nacionalidade do orientador.
        - `cidade_nascimento`: ***<u>(restrito)</u>***: Cidade de nascimento do orientador.
        - `estado_nascimento`: O estado de nascimento do orientador.
        - `pais_nascimento`: O país de nascimento do orientador.
        - `raca`: A raça do orientador.
        - `sexo`: O sexo do orientador.
        - `orientacao_sexual`: ***<u>(restrito)</u>*** Orientação sexual do orientador.
        - `identidade_genero`: ***<u>(restrito)</u>*** Identidade de gênero do orientador.
        - `cpf`: ***<u>(restrito)</u>*** CPF do orientador.
    - `titulo_projeto`: O título do projeto.
    - `palavras_chave`: As palavras-chave associadas ao projeto.
    - `bolsas`: Uma matriz de objetos, na qual cada objeto representa uma bolsa que o projeto recebeu.
        - `sequencia_fomento`: Posição sequencial do fomento atribuído ao projeto (i.e. se é o primeiro, segundo, terceiro fomento do projeto)
        - `nome_fomento`: O nome do fomento.
        - `edital_fomento`: O edital do fomento.
        - `data_inicio_fomento`: A data de início do fomento.
        - `data_fim_fomento`: A data de término do fomento.


## Exemplo

### Requisição

```bash
curl --location --request GET 'api.fflch.usp.br/v1/iniciacao-cientifica/projetos' \
--header 'Content-Type: application/json' \
--data '{
    "columns": {
        "id_projeto": 1,
        "situacao_projeto": 1,
        "nome_departamento": 1,
        "orientador": {
            "sexo": 1
        },
        "bolsas": {
            "nome_fomento": 1
        }
    },
    "filters": {
        "id_projeto": "2016-1014"
    }
}'
```

<br>

### Response

```json
{
    "total_records": 1,
    "current_page": 1,
    "per_page": 100,
    "first_item": 1,
    "last_item": 1,
    "data": [
        {
            "id_projeto": "2016-1014",
            "situacao_projeto": "Aprovado",
            "nome_departamento": "Geografia",
            "orientador": {
                "sexo": "M"
            },
            "bolsas": [
                {
                    "nome_fomento": "Unidade USP"
                }
            ]
        }
    ]
}
```

## Erros

`400 Bad Request`: Este erro ocorre quando o corpo da requisição falha na validação.
