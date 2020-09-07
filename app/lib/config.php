<?php
    
    header("Content-type: text/html; charset=utf-8");
    
    session_start();

    date_default_timezone_set('America/Sao_Paulo');

    //Modo producao ou desenvolvimento
    define('ENVIRONMENT', 0);

    // Verifica o ambiente para mostrar ou não todos os erros
    if (!ENVIRONMENT) {
        define('ABSPATH', 'http://127.0.0.1/cruds/cliente/');
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        define('DB_HOST',    'localhost');
        define('DB_USER',    'teste');
        define('DB_PASS',    '123456');
        define('DB_NAME',    'clientes');
        define('DB_CHARSET', 'utf8');  
    } else {
        define('ABSPATH', 'http://www.arturweb.com.br/clientes/');
        error_reporting(0);
        ini_set("display_errors", 0);
        define('DB_HOST',    'br966.hostgator.com.br');
        define('DB_USER',    'cacamb14_user');
        define('DB_PASS',    'crud@999');
        define('DB_NAME',    'cacamb14_cliente');
        define('DB_CHARSET', 'utf8');  
    }
?>