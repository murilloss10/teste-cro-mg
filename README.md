<p align="center"><a target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Sobre a aplicação

Projeto em Laravel com a implementação de login pelo _Session_ do [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits), CRUD de inserção de dados nas entidades de Cadastro de Usuário, Perfil, Endereço e Filmes Favoritos. As entendades então ficaram definidas da seguinte forma:

- **Cadastro de Usuário:** nome, sobrenome, email, senha;
- **Perfil de Usuário:** titulação, CPF e RG;
- **Endereço:** rua, número, complemento, bairro e CEP;
- **Filmes Favoritos:** título, ano de lançamento e diretor.

**Observação:** cada usuário tem apenas um perfil e as demais entidades podem ser inseridas indeterminadamente.

## Preparação do ambiente

Para o desenvolvimento da aplicação usei o servidor do Laragon e gerenciador de banco de dados vindo dentro dele, o HeidiSQL e criei a aplicação dentro do diretório _`/laragon/www/`_, este, específico para a rodagem do servidor.

Após clonagem do repositório: `https://github.com/murilloss10/teste-cro-mg.git` no seu editor de texto ou IDE, crie um banco de dados e logo após altere o arquivo ` .env ` no diretório raiz:

```

DB_DATABASE=nome_banco_de_dados
DB_USERNAME=username_do_banco
DB_PASSWORD=senha_do_banco_ou_vazio

```

Após conferir o nome do banco de dados abra o terminal na pasta do projeto e digite ` php artisan migrate ` para gerar as tabelas definidas nas _migrations_. Concluindo a criação, com o servidor local (no meu caso o Laragon) e banco de dados conectados, basta digitar o comando ` php artisan serve ` para rodar a aplicação em ambiente local e abri-lá no navegador com a URL indicada no terminal.


## Funcionalidades

A aplicação conta com uma responsividade provinda das bibliotecas Bootstrap e dos módulos instalados do [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits), que foram essenciais para páginas que se adequam de acordo com a resolução ou dispositivo, como por exemplo o _mobile_, que ganha um menu totalmente adequado.

Dentre as principais funcionalidades desenvolvidas estão:

### Menu

O menu é uma funcionalidade presente em todas as páginas, com links para acesso à outras páginas e à opção de Sair da sessão atual.

### Dashboard

Uma página inicial para os usuários que dispõe da exibição dos filmes e endereços adicionados com link em suas intitulações para as páginas de cadastros das respectivas entidades.

### Dados Pessoais

Dados Pessoais ou Perfil é a página destinada a 

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
