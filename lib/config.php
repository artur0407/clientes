<?php
    session_start();
    header("Content-type: text/html; charset=utf-8");
    date_default_timezone_set('America/Sao_Paulo');
    define('ENVIRONMENT', 0);

    if (!ENVIRONMENT) {
        error_reporting(E_ALL);
        define('ABSPATH', 'http://127.0.0.1/cruds/cliente/');
        ini_set("display_errors", 1);
        define('DB_HOST',    'localhost');
        define('DB_USER',    'teste');
        define('DB_PASS',    '123456');
        define('DB_NAME',    'clientes');
        define('DB_CHARSET', 'utf8');  
    } else {
        error_reporting(0);
        ini_set("display_errors", 0);
        define('ABSPATH',    'http://www.seudominio.com.br/');
        define('DB_HOST',    'seuservidor');
        define('DB_USER',    'user_bd');
        define('DB_PASS',    'pass_bd');
        define('DB_NAME',    'name_bd');
        define('DB_CHARSET', 'utf8');  
    }
?>