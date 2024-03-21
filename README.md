# Desafio SGBR API

Desenvolvedor Anderson Belderrama - andersonbelderrama@gmail.com

## Ambiente Desenvolvimento e QA

Instalar dependencias do composer
`composer install`

Tip - Crie uma alias para comando sail evitando digitar ./vendor/bin/sail e digitar somente sail
`alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'`

Iniciar ambiente docker
`./vendor/bin/sail up -d`

Parar ambiente docker
`./vendor/bin/sail down`

Gerar laravel Key
`sail artisan key:generate`

Gerar banco dados juntamente com dados fake
`sail artisan migrate:fresh --seed`

Gerar banco dados
`sail artisan migrate`

Testes
`sail test`


## Informaçoes de utilização da API
Header
`Accept = application/json`

Payload dos metodos criar e atualizar
```json
[
  {
    "name": "Shopping Eldorado",
    "slug": "shopping-eldorado-sp",
    "city": "São Paulo",
    "state": "SP"
  }
]

```

### Endpoints


#### Listar Lugares

GET
`/api/places`

Parametros (opcionais):

`per_page = {quantidade de registros por pagina}`

`filter[name] = {termo de busca}`



#### Criar Lugar

POST

`/api/places`



#### Exibir Lugar

GET

`/api/places/{$id}`



#### Atualizar Lugar

PUT

`/api/places/{$id}`



#### Deletar Lugar

DELETE

`/api/places/{$id}`

