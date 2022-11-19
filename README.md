# Promobit-teste

## Docker

No terminal entre na pasta (/docker) e execute o comando:

```bash
docker-compose up -d
```
Obs: criar o banco de dados no conteiner promobit_mysql, no terminal na pasta (/docker)
```
docker exec -it promobit_mysql bash
mysql -u root -p
root
CREATE DATABASE promobit;
```
## ⚙️ Configuração do ENV

Copie o arquivo .env.example e renomeie como .env

```bash
cp .env.example .env
```
No arquivo .env configure nome do APP e banco de dados, referência no docker-composer.
```
APP_NAME=Promobit

DB_CONNECTION=mysql
DB_HOST=172.20.0.5
DB_PORT=3306
DB_DATABASE=promobit
DB_USERNAME=root
DB_PASSWORD=root
```
No terminal entre na pasta da aplicação (site/promobit) execute o comando:
```
php artisan migrate
```

## ✨ Iniciando servidor

Inicie o servidor com

```bash
php artisan serve
```
se necessário execute o comando:
```
npm run dev
```
## Cadastro de produtos.
- Para atrelar uma ou mais, ou tirar 'tags' do produto pressione Ctrl+Click


## 📝 SQL de extração de relatório de relevancia de produtos.
```
SELECT
    t.id AS `Id da tag`,
    t.name AS Nome,
    GROUP_CONCAT(p.name ORDER BY p.id SEPARATOR ', ') AS `Produto vinculado`
FROM tags AS t
         LEFT JOIN product_tag AS pt ON t.id = pt.tag_id
         LEFT JOIN products AS p ON p.id = pt.product_id
GROUP BY t.id;
```
Obs: Lista de tags com os produtos atrelados, separado por virgula.

