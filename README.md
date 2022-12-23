<p align="center"><img src="public/images/logo-supera.svg" width="400" alt="Logo supera"></p>



# Desafio Laravel

Para testar o projeto, seguir os seguintes passos:

## Download do Projeto

```
git clone git@github.com:Quessada/desafio-supera.git
```

Entre no diretório do projeto e execute os seguintes comandos:

```bash
cd desafio-supera/
```

```bash
cp .env.example .env
```

```bash
composer install
```

```bash
npm install
```

```bash
php artisan key:generate
```

```bash
npm run dev
```

Crie um banco de dados no `MySQL/phpmyadmin` com o nome de `supera` e a `collation uft8mb4_unicode_ci`

Execute o comando para criar as tabelas e popular o banco de dados com o usuário padrão:

```bash
php artisan migrate --seed
```

Para acessar o sistema utilize as seguintes credenciais:

email: admin@admin.com

senha: admin1234



