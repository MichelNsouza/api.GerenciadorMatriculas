# Gerenciador de Matriculas - BackEnd

## Sobre o Projeto
O projeto trata-se de uma api que gerencia matriculas de alunos de uma unidade academica XYZ.
onde é possivel cadastrar alunos e cursos, consultar cursos e alunos ativos e inativos

## Tecnologias Utilizadas no Back-end
- Laravel: Deploy no vercel
- MySql: FreeHostia

Esta é uma API RESTful e no momento, não há autenticação via token, portanto, você pode realizar as requisições diretamente para os seguintes endpoints:

**Base URL:** `https://api-gerenciador-matriculas.vercel.app/api/api/alunos`  
**Base URL:** `https://api-gerenciador-matriculas.vercel.app/api/api/cursos`  
(Note que o caminho inclui `/api/api` devido à configuração no Vercel rsrs.)
### Estrutura do Aluno

Para criar ou atualizar um aluno, utilize o seguinte modelo JSON:

```json
{
  "nome": "Nome do aluno",
  "registroDoAluno": "Registro Acadêmico",
  "curso_id": 1
}
```

### Estrutura do Curso

Para criar ou atualizar um curso, utilize o seguinte modelo JSON:

```json
{
  "nome": "Nome do curso",
  "descricao": "Descrição do curso"
}
```

## Endpoints
### Alunos

1. **Listar todos os alunos**
   - **Método:** `GET`
   - **Rota:** `/alunos`
   - **Descrição:** Recupera uma lista de todos os alunos.

2. **Criar um novo aluno**
   - **Método:** `POST`
   - **Rota:** `/alunos`
   - **Descrição:** Cria um novo aluno. É necessário enviar os dados do aluno no corpo da requisição.

3. **Mostrar um aluno específico**
   - **Método:** `GET`
   - **Rota:** `/alunos/{aluno_id}`
   - **Descrição:** Recupera as informações de um aluno específico baseado no `aluno_id`.

4. **Atualizar um aluno específico**
   - **Método:** `PUT` ou `PATCH`
   - **Rota:** `/alunos/{aluno_id}`
   - **Descrição:** Atualiza um aluno específico baseado no `aluno_id`. Os dados atualizados devem ser enviados no corpo da requisição.

5. **Excluir um aluno específico**
   - **Método:** `DELETE`
   - **Rota:** `/alunos/{aluno_id}`
   - **Descrição:** Remove um aluno específico baseado no `aluno_id`.

6. **Desativar um aluno por RA**
   - **Método:** `POST`
   - **Rota:** `/aluno/desativar/{ra}`
   - **Descrição:** Desativa um aluno com base no Registro Acadêmico (RA) fornecido.

7. **Ativar um aluno por RA**
   - **Método:** `POST`
   - **Rota:** `/aluno/ativar/{ra}`
   - **Descrição:** Ativa um aluno com base no Registro Acadêmico (RA) fornecido.

### Cursos

1. **Listar todos os cursos**
   - **Método:** `GET`
   - **Rota:** `/cursos`
   - **Descrição:** Recupera uma lista de todos os cursos.

2. **Criar um novo curso**
   - **Método:** `POST`
   - **Rota:** `/cursos`
   - **Descrição:** Cria um novo curso. É necessário enviar os dados do curso no corpo da requisição.

3. **Mostrar um curso específico**
   - **Método:** `GET`
   - **Rota:** `/cursos/{curso_id}`
   - **Descrição:** Recupera as informações de um curso específico baseado no `curso_id`.

4. **Atualizar um curso específico**
   - **Método:** `PUT` ou `PATCH`
   - **Rota:** `/cursos/{curso_id}`
   - **Descrição:** Atualiza um curso específico baseado no `curso_id`. Os dados atualizados devem ser enviados no corpo da requisição.

5. **Excluir um curso específico**
   - **Método:** `DELETE`
   - **Rota:** `/cursos/{curso_id}`
   - **Descrição:** Remove um curso específico baseado no `curso_id`.

## Front-end
- VueJs Deploy no vercel
    - BootStrap
    - Pinia - gerenciamento de estado
    - Vue-Router - Roteamento baseado em componente
    - Axios -  Cliente HTTP 
    - Vite -  Pré-empacotamento de dependência

O código-fonte do Front-end associado a este projeto pode ser encontrado no seguinte repositório do GitHub: [Front-End gerenciador de matriculas](https://github.com/MichelNsouza/front.GerenciadorMatriculas).

### Imagens
![image](https://github.com/user-attachments/assets/855bb5ad-56e9-47cf-8737-8ab2c1619e0d)
![image](https://github.com/user-attachments/assets/39fbf90d-4ddf-4f3a-b0f5-71852a1de588)

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
