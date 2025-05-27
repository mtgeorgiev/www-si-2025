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

set_exception_handler(function ($exception)
{
    if ($exception instanceof RegisterUserException) {
        http_response_code(400);
        $error = $exception->getMessage();
    } else {
        http_response_code(500); // Internal Server Error
        $error = "Unknown error occurred";
    }
    
    echo json_encode(['error' => $error], JSON_UNESCAPED_UNICODE);
});