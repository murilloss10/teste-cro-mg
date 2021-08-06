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

A aplicação conta com uma responsividade provinda das bibliotecas Bootstrap e dos módulos instalados do [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits), que foram essenciais para páginas que se adequam de acordo com a resolução da janela ou dispositivo, como por exemplo o _mobile_, que ganha um menu totalmente adequado.

Dentre as principais funcionalidades desenvolvidas estão:

### Cadastro de Usuário

Função a ser utilizada para o cadastro de novos usuário. Possuindo campos de ` Nome `, ` Sobrenome `, ` Email ` e ` Senha `. Para acessar esta página basta usar a rota ` /registrar `.

### Login de Usuário

Complementando a função de cadastro, o Login serve única e exclusivamente para validar o acesso do usuário, com a solicitação de ` Email ` e ` Senha `, e para acessar basta digitar a rota ` /login `.

### Menu

O menu é uma funcionalidade presente em todas as páginas, com links para acesso à outras páginas e à opção de Sair da sessão atual.

### Dashboard

Uma página inicial para os usuários que dispõe da exibição dos filmes e endereços adicionados com link em suas intitulações para as páginas de cadastros das respectivas entidades.

Esta rota é a inicial após a validação do login e para acessá-la basta digitar ` / `.

### Dados Pessoais

Dados Pessoais ou Perfil é a página destinada a inserção de dados pessoais do usuário, mais precisamente o números de Títulação, CPF e RG. Os campos deste dados são formatados e validados para aceitar apenas entradas que satisfaçam as exigências da aplicação.

A rota desta página foi definida como ` /dados-pessoais `.

### Filmes Favoritos

Uma página de inserção de filmes favoritos do usuário e que igual a função da página de Dados Pessoais tem campos formatados e validados, mas diferente da mesma, possui uma tabela contendo todas os filmes adicionados pelo o usuário. Esta mesma tabela possui as opções de ` Exibir `, ` Editar ` e ` Excluir `, onde a função ` Exibir ` abre um modal contendo as informações referentes a aquele ` id `, a opção ` Editar ` é responsável por abrir um outro formulário com as informações referentes à aquele ` id ` preenchidas em seus respectivos campos. Já a função ` Excluir ` fica responsável por fazer a remoção de todos os dados do registro selecionado.

No backend da aplicação um campo é responsável por armazenar um link padrão para abrir as imagens no ` dashboard `.

A rota principal dos filmes é a ` /filmes-favoritos `, onde estão listados todos os filmes cadastrados e o formulário para cadastro.

### Endereços

Assim como a página de Filmes Favoritos, a página de Endereços possui campos formatados e validados, tabela contendo os dados cadastrados, no caso, os endereços cadastrados e as opções de ` Exibir `, ` Editar ` e ` Excluir ` explicadas anteriormente.

Parecida com a rota de filmes, a de endereços também possui uma principal onde é listado todos os endereços cadastrados e o formulário para cadastro. A rota é a ` /enderecos `.
