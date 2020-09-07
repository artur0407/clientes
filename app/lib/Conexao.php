<?php
namespace lib;

use PDO;
use PDOException;

class Conexao 
{  
    private static $pdo;
 
    private function __construct() {}

    public static function getInstance() 
    {  
        if (!isset(self::$pdo)) {  
            try {  
                $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
                self::$pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME . "; charset=" . DB_CHARSET . ";", DB_USER, DB_PASS, $opcoes);  
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {  
                print "Erro: " . $e->getMessage();  
            }  
        }

        return self::$pdo;  
    }
}