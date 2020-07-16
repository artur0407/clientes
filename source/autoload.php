<?php

spl_autoload_register(function ($class) {
    $prefix = "source\\"; //namespace
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;
    $len = strlen($prefix);

    if(strncmp($prefix, $class, $len) !== 0) {
         return;
    }

    $relativeClass = substr($class, $len);

    $file = $baseDir .str_replace("\\", DIRECTORY_SEPARATOR, $relativeClass) . ".php";
    
    if(file_exists($file)){
        require_once $file;
    }
});