# BlastMail

BlastMail e um gerenciador de envio de e-mails desenvolvido como desafio pratico durante os estudos com a [Rocketseat](https://rocketseat.com.br).

O projeto foi construido com o objetivo de aprimorar os conteudos do percurso **"Laravel: dos fundamentos a pratica em projetos reais"**, aplicando conceitos do framework em uma aplicacao real para cadastro de listas, assinantes, templates, campanhas e acompanhamento de metricas de envio.

As instrucoes originais do desafio estao disponiveis em:

[Desafio pratico - Gerenciador de envio de e-mails](https://efficient-sloth-d85.notion.site/Desafio-pr-tico-Gerenciador-de-envio-de-e-mails-6c453201c6434603b6715ce979c64862)

## Sobre o projeto

A aplicacao permite criar e gerenciar campanhas de e-mail a partir de listas de contatos e templates personalizados. Tambem possui recursos para acompanhar aberturas, cliques e estatisticas das campanhas enviadas.

Principais funcionalidades:

- autenticacao de usuarios com Laravel Breeze;
- cadastro de listas de e-mail;
- cadastro e remocao de assinantes;
- criacao e edicao de templates;
- fluxo em etapas para configuracao, conteudo e agendamento de campanhas;
- envio de campanhas por filas;
- tracking de abertura e clique;
- visualizacao de estatisticas da campanha;
- exclusao e restauracao de campanhas com soft deletes.

## Conteudos praticados

Durante o desenvolvimento foram trabalhados os seguintes temas:

- Laravel;
- estrutura de arquivos do Laravel;
- migrations;
- comandos com PHP Artisan;
- Laravel Form Request;
- Route Model Binding;
- politicas e recursos de seguranca do Laravel;
- Blade Components;
- estilizadas com Tailwind CSS e Daisy.UI;
- Laravel Breeze;
- transactions;
- servidor de e-mail local MailPit;
- debugging com Laravel Debugbar.

## Tecnologias

- PHP 8.3+
- Laravel 13
- MySQL
- Laravel Breeze
- Blade
- Tailwind CSS
- Vite
- Pest
- MailPit
- Laravel Debugbar

## Como executar

Clone o repositorio e instale as dependencias:

```bash
composer install
npm install
```

Crie o arquivo de ambiente e gere a chave da aplicacao:

```bash
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blastmail
DB_USERNAME=root
DB_PASSWORD=
```

Execute as migrations e, se desejar, os seeders:

```bash
php artisan migrate
php artisan db:seed
```

Inicie a aplicacao:

```bash
composer run dev
```

Esse comando sobe o servidor Laravel, o worker de filas e o Vite em paralelo.

## E-mails locais

Para testar os envios localmente, utilize o MailPit. Ajuste o `.env` conforme a porta configurada no seu ambiente:

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Depois, acesse a interface web do MailPit, normalmente em:

```text
http://localhost:8025
```

## Testes

Para executar a suite de testes:

```bash
composer test
```

## Licenca

Este projeto foi desenvolvido para fins de estudo e pratica.
