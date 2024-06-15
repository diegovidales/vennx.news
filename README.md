## Sobre o projeto

O projeto consiste na criação de uma página de listagem de notícias e uma página de cadastro de notícias, com a tela de cadastro protegida por login e senha. Assim, o desenvolvimento será dividido em uma área pública e outra restrita.

## Estrutura do banco de dados

O banco de dados consiste em uma estrutura simples, com uma tabela de usuários (users) para controlar acesso a criação e edição de notícias, sem um sistema de permissões com hierarquia, e uma tabela de notíticias (news), conforme mostrado na UML abaixo:

[UML do banco de dados](https://www.figma.com/board/LAdThYHbVbP1W5Ll2EQ8Hp/Vennx-News---UML?node-id=0-1&t=k1YmgZPm9BggVEZK-1)

O campo de título (title) é obrigatório e único, evitando assim duas notícias cadastradas com o mesmo título. Já o campo de descrição (description) e obrigatório e o caminho da imagem (image_path) é opcional (nullable). 

## Requisitos do projeto

O projeto consiste em um sistema de notícias onde: 
- a visualização das notícias deve ser apresentada em uma página pública, com uma listagem paginada mostrando 6 notícias por página;
- Os usuários poderão realizar pesquisa pelo título da notícia;
- Deverá ser implementado um CRUD completo para as notícias, possibilitando a criação, edição e exclusão (apenas para usuários registrados e autenticados no sistema.

### Componentes tecnológicos

O projeto deverá ser desenvolvido utilizando as seguintes ferramentas:
- Laravel
- Livewire
- Tailwind


# Instalação

```sh
# clone o repositório
git clone https://github.com/diegovidales/vennx.news.git

# entre no diretório do projeto
cd vennx.news

# instale as dependências
composer install

# configure o arquivo .env
cp .env.example .env

# gere uma chave para o projeto
php artisan key:generate

# crie o banco de dados com o nome vennx_news e atualize as credenciais no arquivo .env
CREATE DATABASE vennx_news;

# execute a migration
php artisan migrate

# se preferir executar os teste com o banco de dados preenchido com dados fake, utilize a opção --seed ou execute o comando abaixo após a migrate
php artisan db:seed

# instale as dependencias do node
npm install

# execute o Vite
npm run dev

```

## Considerações sobre as decisões tomadas no projeto
- Todos os termos utilizados para nomenclatura no código fonte estão por padrão na língua inglesa para facilitar a integração com equipe de desenvolvedores nativos de outros países. Para textos que são mostrados ao usuário, utilizo o arquivo de tradução do laravel.
- Optei por utilizar também a data de edição da notícia (timestamp completo do laravel), possibilitando mostrar quando foi a ultima atualização da notícia quando editada.
- Decidi não utilizar o laravel Breeze ou Jetstream, o que facilitaria a construção da autenticação de usuário, com o intuito de demonstrar a construção da autenticação manual, com maior controle por parte do desenvolvedor.
- Decidi armazenar as imagens das notícias no sistema de arquivos e armazenar somente o caminho da imagem no banco de dados para evitar armazenar arquivos binários muito grandes diretamente no banco de dados (como uma imagem base64), utilizando desta forma o storage do laravel.
- O campo de senha do usuário deve ter pelo menos 6 caracteres contendo pelo menos uma letra e um número. Esta decisão foi apenas para mostrar algumas formas de validação de senha.
- Foi adicionado um filtro simples de data com alguns valores pré-determinados com o intuito de demonstrar algumas técnicas do laravel, como a utilização de Enum, e o filtro simultâneo com múltiplas alterações da $query de filtro. 


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
