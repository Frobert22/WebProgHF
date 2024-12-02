<?php

spl_autoload_register(function ($className) {
    $parts = explode('\\', $className);
    $file = end($parts) . '.php';
    $file = __DIR__ . '\\' . $className . '.php';
    echo $file;
    if (file_exists($file)) {
        include $file;
    } else {
        throw new \Exception("Hianyzo fajl!");
    }

});