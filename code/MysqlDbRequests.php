<?php

class MysqlDbRequests implements DbRequests
{
    public function getAllUsers(): array
    {
        $connection = (new Db())->getConnection();

        $selectStatement = $connection->prepare("SELECT * FROM users");
        $selectStatement->execute([]);

        $userData = $selectStatement->fetchAll();
        $users = [];
        foreach ($userData as $user) {
            $users[] = User::fromArray($user);
        }
        return $users;
    }

    public function getUserById(int $id): ?User
    {
        $connection = (new Db())->getConnection();

        $selectStatement = $connection->prepare("SELECT * FROM users WHERE id = :id");
        $selectStatement->execute(['id' => $id]);

        $userData = $selectStatement->fetch();

        return $userData ? User::fromArray($userData) : null;
    }

    public function getUserByUsername(string $username): ?User
    {
        $connection = (new Db())->getConnection();

        $selectStatement = $connection->prepare("SELECT * FROM users WHERE username = :username");
        $selectStatement->execute(['username' => $username]);

        $userData = $selectStatement->fetch();

        return $userData ? User::fromArray($userData) : null;
    }

}