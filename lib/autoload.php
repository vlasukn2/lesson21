<?php

spl_autoload_register(function($className){
    $path = explode('\\', $className);
    $path = implode('/', $path);

    $file = "../$path.php";

    if (!file_exists($file)) {
        throw new Exception("File '$file' doesn't exist.");
    }

    include $file;
});
