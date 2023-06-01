# Product CRUD system

This is a CRUD challenge for MailUp

## Table of Contents

- [Requirements](#requirements)
- [How to Run](#how-to-run)
- [Authentication](#authentication)
- [Endpoints](#endpoint-examples)
- [Responses](#response)
- [Features](#api-features)

## Requirements 
* PHP 8.1
* Composer
* Node

##  How to Run
```bash
composer install
npm install && npm run dev
cp .env.example .env 
php artisan migrate:fresh --seed
php artisan serve
```
You **MUST** specify your databas credentials in the .env file and save the logged API key.

## Authentication
You **MUST** include the **API token** as a **Bearer-Token** in all the requests and set **Accept=application/json** header

## Endpoint Examples

| Method   | URL                                      | Description                              |
| -------- | ---------------------------------------- | ---------------------------------------- |
| `GET`    | `/api/v1/product`                             | Get all products.                      |
| `GET`    | `/api/v1/product/14`                          | Get product with ID 14.                       |
| `GET`    | `/api/v1/product?page=2&=rows=10`                             | Pagination.                      |
| `GET`    | `/api/v1/product?name=Jabon`                             | Get records with name like "Jabon".                      |
| `POST`   | `/api/v1/product`                             | Create a product.                       |
| `DELETE`    | `/api/v1/product/14`                          | Get product with ID 14.                       |
| `PUT-PATCH`    | `/api/v1/product/14`                          | Update record 14.                       |

## Response
```javasript
{
  "status"  : string,
  "message" : string,
  "data"    : array|null|string
}
```
## API features
* Versioning
* Custom responses with status code
* Exception handlers
* CRUD
* CRUD validation
* Filter records with pipelines
* Seeders
* Authorization