<?php

class Db
{
    private $connection;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbName = "www_si_2025";
        $userName = "root";
        $userPassword = "";

        $this->connection = new PDO("mysql:host=$dbhost;dbname=$dbName", $userName, $userPassword,
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT // PDO::ERRMODE_EXCEPTION
            ]);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}