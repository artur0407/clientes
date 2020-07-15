# Projeto Web - CRUD com PHP HTML CSS e JS

## Front-End: Bootstrap e Jquery
## Back-End: PDO & MySQL

###### Desenvolvimento de um sistema simples para Controle de Clientes.

## Ferramentas utilizadas:
- Framework/biblioteca em PHP => PDO(PHP DATA OBJETC).
- Banco de Dados => Mysql;
- Framework JS => Jquery;
- Framework CSS => Bootstrap;

## Requisitos do Projeto:
- Campos para o cadastro de cliente: Nome, data de nascimento, sexo, cep, endereço, número, complemento, bairro, estado, cidade.
- Consumir webservice para consulta de cep: https://viacep.com.br/, preencher campos do cadastro após a consulta do cep.
- Validar cadastro de cliente: Nome, data de nascimento e sexo obrigatórios.

## Configuração do Projeto:
- Executar a query crmall.sql ou importar o arquivo no phpMyAdmin para criar a table necessária.
- Editar o arquivo **lib/config.php** 

## Estrutura do Projeto
- Dir. css => biblioteca de estilos do boostrap
- Dir. js => bilbioteca jquery e scripts usados na consulta ao cep e em validações
- Dir. lib => configurações gerais do php, funções e banco de dados
- clienteControl.php => Tratamento das requisições para o CRUD: (Create, Read, Update e Delete)
- cllienteForm.php => Formulário para cadastro e edição do cliente
- index.php => listagem geral de clientes cadastrados

## Endereço do projeto em funcionamento
###### http://www.arturweb.com.br/clientes/