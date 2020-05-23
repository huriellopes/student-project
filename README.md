# Projeto de Estudo

> Projeto de estudo com Laravel Framework 7.x

## Para testar

<p>Clone o repositório: </p>

````
git clone https://github.com/huriellopes/student-project.git
````

<p>Copie o .env.example: </p>

````
copy .env.example .env
````

<p>Gere o token do Laravel para o .env</p>

````
php artisan key:generate
````

<p>Configure o banco de dados no .env, para utilizar o sqlite: </p>

````
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=/student-project/database/database.sqlite
#DB_USERNAME=root
#DB_PASSWORD=
````

<p>Baixe as dependências do Laravel:</p>

````
composer install
````

<p>Baixe as dependências do npm e rode o comando dev: </p>

````
npm install && npm run dev
````

<p>Rode as migrations e o seed: </p>

````
php artisan migrate --seed
````

<p>Usuário pré-definido: </p>

````
Login: admin@email.com.br
Senha: password
````

<p>Rode o servidor embutido do php: </p>

````
php artisan serve
````

<p>Acesse no navegador: </p>

````
http://localhost:8000
````
