<?php

session_start();

spl_autoload_register(function ($class) {

    $includePaths = [
        './code'
    ];

    foreach ($includePaths as $path) {
        if (file_exists("{$path}/{$class}.php")) {
            require_once "{$path}/{$class}.php";
            return;
        }
    }

    die("Class {$class} not found in include paths: " . implode(', ', $includePaths));

});

set_exception_handler(function ($exception) {
    // TODO implement some other day
});