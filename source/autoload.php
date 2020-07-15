<?php

spl_autoload_register(function ($class) {
    $prefix = "Source\\"; //namespace
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;
    $len = strlen($prefix);

    if(strncmp($prefix, $class, $len) !== 0) {
         return;
    }

    $relativeClass = substr($class, $len);

    $file = $baseDir . str_replace("\\", "/", $relativeClass) . ".php";

    if(file_exists($file)){
        require $file;
    }
});