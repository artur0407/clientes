<?php
define('DS', DIRECTORY_SEPARATOR);

spl_autoload_register(function($classe){
    $diretorioBase = __DIR__ . DS;
    $classe = $diretorioBase . 'source' . DS . str_replace('\\', DS, $classe) . '.php';
    if (file_exists($classe) && !is_dir($classe)) {
        include $classe;
    }
});