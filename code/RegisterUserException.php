<?php

class RegisterUserException extends Exception
{
 
    public function __construct(string $message)
    {
        parent::__construct("Неуспешна регистрация: " . $message);
    }

}