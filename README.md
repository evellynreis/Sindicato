# Sindicato Trainer - Sistema de Gerenciamento Sindical

Bem-vindo ao Sindicato Trainer, sistema de sindicato que permite realizar operações como login, cadastro de usuários (caso você seja um administrador), cadastro de dependentes, cadastro de empresa, cadastro de cargo, cadastro de filiados, além de registrar a situação dos filiados.

## Recursos Principais

- **Login:** Os usuários podem realizar login para acessar as funcionalidades do sistema.

- **Cadastro de Usuários:** Os administradores podem cadastrar novos usuários para acessar o sistema.

- **Cadastro de Dependentes:** Possibilidade de cadastrar dependentes associados aos filiados.

- **Cadastro de Empresa e Cargo:** Registre informações sobre empresas e cargos associados aos filiados.

- **Situação do Filiado:** Registro da situação dos filiados, proporcionando um controle mais detalhado.

- **Arquitetura MVC:** O projeto utiliza a arquitetura Model-View-Controller (MVC) para uma organização estruturada do código.

- **Rotas Amigáveis:** Implementação de rotas amigáveis para uma experiência de usuário mais amigável e URLs mais legíveis.

- **Paginação:** Funcionalidade de paginação para facilitar a navegação em listas extensas de dados.

- **Relatórios em PDF:** Utilização da biblioteca FPDF para a criação de relatórios em PDF com informações sobre os filiados.

## Tecnologias Utilizadas

- **PHP e JS:** Linguagens de programação utilizadas para o desenvolvimento do sistema.

- **jQuery:** Biblioteca JavaScript utilizada para simplificar a manipulação de elementos HTML.

- **Docker:** Utilização de contêineres Docker para facilitar a implantação e execução do sistema em diferentes ambientes.

- **MySQL e mysqli:** Banco de dados MySQL com conexão realizada através da extensão mysqli.

## Instalação

1. Clone o repositório: `git clone https://github.com/seu-usuario/sindicato-trainer.git`
2. Configurar banco de dados, conforme está descrito no docker, além de executar o script sql disponivel no projeto.
3. Configure o ambiente Docker.
4. Execute os contêineres Docker: `docker-compose up -d`

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues, pull requests ou fornecer feedback.
