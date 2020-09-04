<?php
spl_autoload_register(function ($class) {
    $file = "source/$class.php";
    require_once $file;
});