# Documentação

### Start Laravel

Comand: composer update && php artisan serve
Comand: php artisan migrate --seed || php artisan migrate:fresh --seed // para encher o banco com o seeder

### Front end
Comand: npm install && npm run dev

### APIs

### auth

#### Nova Unidade

Rota: /api/unidade

###### Body

```json
{
    "nome":"string",
    "razao_social":"string",
    "cnpj":"numeric"
}
```

###### Success: response

```json
{
    "nome":"string",
    "razao_social":"string",
    "cnpj":"numeric"
}
```

#### Novo colaborador

Rota: /api/colaborador

###### Body

```json
{
    "unidade_id": "numeric",
    "nome": "string",
    "cpf": "numeric",
    "email": "string|email",
    "cargo_id": "numeric",
    "nota_desempenho": "numeric"
}
```

###### Success: response

```json
{
    "unidade_id": "numeric",
    "nome": "string",
    "cpf": "numeric",
    "email": "string|email",
    "cargo_id": "numeric",
    "nota_desempenho": "numeric"
}
```

#### Novo colaborador

Rota: /api/colaborador/update/nota/{colaborador_id}

###### Body

```json
{
    "nota_desempenho":"numeric|1,10"
}
```

###### Success: response

```json
{
    "Sucesso."
}
```
