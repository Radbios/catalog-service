<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# Catalog Service - Sistema de E-commerce com Microsserviços

Este microsserviço é responsável pelo gerenciamento e fornecimento dos dados dos produtos disponíveis na plataforma de e-commerce. Ele expõe endpoints REST que permitem a listagem, busca, e consulta detalhada de produtos. É utilizado tanto pelo frontend quanto por outros microsserviços, como o carrinho de compras e o serviço de pedidos.

## Funcionalidades

* Listagem paginada de produtos
* Filtro por nome (busca textual)
* Filtro por IDs (retorno de múltiplos produtos específicos)
* Consulta individual de produto por ID

## Rotas disponíveis

### GET `/api/service/catalog/products`

Retorna uma lista paginada de produtos. Suporta busca textual por nome com o parâmetro `search`.

**Exemplo de requisição:**

```
/api/service/catalog/products?search=camisa
```

### GET `/api/service/catalog/products/get`

Retorna todos os produtos que atendem aos filtros enviados, como lista de IDs e nome.

**Exemplo de requisição:**

```
/api/service/catalog/products/get?ids[]=1&ids[]=2
```

### GET `/api/service/catalog/products/{product}`

Retorna os detalhes de um único produto com base no ID fornecido na URL.

**Exemplo de resposta:**

```json
{
  "id": 1,
  "name": "Camisa Polo",
  "description": "Camisa confortável de algodão",
  "price": 79.90,
  "created_at": "2025-05-11T10:00:00.000000Z"
}
```

## Estrutura e arquivos principais

| Arquivo                 | Descrição                                                          |
| ----------------------- | ------------------------------------------------------------------ |
| `ProductController.php` | Controlador com as rotas de listagem, busca e exibição de produtos |
| `Product.php`           | Modelo Eloquent representando os produtos no banco                 |
| `ProductResource.php`   | Define o formato padrão da resposta dos produtos                   |
| `routes/api.php`        | Define as rotas públicas do serviço                                |

## Integração com o sistema

Este serviço é consultado por:

* **Cart-service**: para validar e exibir os detalhes de produtos adicionados ao carrinho
* **Order-service**: para recuperar os dados dos produtos no momento do fechamento do pedido
* **Frontend**: para exibir os produtos no catálogo da loja virtual

Todas as requisições externas são acessadas via API Gateway.

## Requisitos

* Laravel 11
* PHP 8.2+
* API Gateway configurado para rotear as chamadas ao serviço de catálogo

## Observações

Este serviço é essencial para garantir a consistência das informações de produtos no sistema. Ele foi projetado para ser reutilizável por múltiplos microsserviços, promovendo independência e escalabilidade dentro da arquitetura distribuída.

---

