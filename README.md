# Desafio SGBR API

Desenvolvedor Anderson Belderrama - andersonbelderrama@gmail.com

## Ambiente Desenvolvimento e QA

1. Efetue uma copia do modelo `.env.example` para `.env`: 
    ```bash
    cp .env.example .env
    ```

2. Instale as dependências do composer:
    ```bash
    composer install
    ```

    Tip - Crie um alias para o comando sail evitando digitar `./vendor/bin/sail` e digitar somente `sail`:
    ```bash
    alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
    ```

3. Inicie o ambiente docker:
    ```bash
    sail up -d
    ```

4. Pare o ambiente docker:
    ```bash
    sail down
    ```

5. Gere a chave do Laravel:
    ```bash
    sail artisan key:generate
    ```

6. Gere o banco de dados juntamente com os dados fictícios:
    ```bash
    sail artisan migrate:fresh --seed
    ```

7. Gere o banco de dados:
    ```bash
    sail artisan migrate
    ```

8. Execute os testes:
    ```bash
    sail test
    ```


## Informaçoes de utilização da API
Header
`Accept = application/json`

Payload dos metodos criar e atualizar
```json
  {
    "name": "Shopping Eldorado",
    "slug": "shopping-eldorado-sp",
    "city": "São Paulo",
    "state": "SP"
  }

```

### Endpoints


#### Listar Lugares

GET
```bash
/api/places
```

Parametros (opcionais):

```bash 
per_page = {quantidade de registros por pagina}
```

```bash
filter[name] = {termo de busca}
```



#### Criar Lugar

POST

```bash 
/api/places
```



#### Exibir Lugar

GET

```bash
/api/places/{$id}
```



#### Atualizar Lugar

PUT

```bash
/api/places/{$id}
```



#### Deletar Lugar

DELETE

```bash
/api/places/{$id}
```

