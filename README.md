# Projeto Web - CRUD com PHP HTML CSS e JS

## Front-End: Bootstrap e Jquery
## Back-End: PHP & MySQL

###### Desenvolvimento de um sistema simples para Controle de Clientes.

## Ferramentas utilizadas:
- Biblioteca para manipulação do banco com PHP => PDO(PHP DATA OBJETC).
- Banco de Dados => Mysql;
- Framework JS => Jquery;
- Framework CSS => Bootstrap;

## Requisitos do Projeto:
- Campos para o cadastro de cliente: Nome, cpf, data de nascimento, email, telefone.
- Validar todos os campos para serem preenchidos.
- Utilizar mascara nos campos CPF, data de nascimento e telefone

## Estrutura do Projeto
- Dir. css => biblioteca de estilos do boostrap
- Dir. js => bilbioteca jquery e scripts usados em validações
- Dir. source => configurações gerais, de ambiente e arquivo de funções úteis 
- Dir. source/model => interação da classe Cliente com o banco de dados
- Dir. view => telas do sistema
- index.php => tela inicial com a listagem de clientes cadastrados

## Configuração do Projeto:
- Executar a query crud.sql ou importar o arquivo no seu SGBG para criar a estrutura de banco de dados necessária.
- Editar o arquivo **lib/config.php** para modificar ambiente

## Endereço do projeto em funcionamento
###### http://www.arturweb.com.br/clientes/