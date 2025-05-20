<?php

class Session
{
    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['username']);
    }

    public static function login(string $username): void
    {
        $_SESSION['username'] = $username;
    }

    public static function logout(): void
    {
        session_destroy();
    }


    public static function getUsername(): ?string
    {
        return $_SESSION['username'] ?? null;
    }


}