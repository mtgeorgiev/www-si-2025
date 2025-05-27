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

    public function insertUser(string $username, string $password): ?User
    {
        $connection = (new Db())->getConnection();

        $insertStatement = $connection->prepare("INSERT INTO users (`username`, `password`) VALUES (:username, :pasword)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertResult = $insertStatement->execute([
            'username' => $username,
            'pasword' => $hashedPassword
        ]);

        if ($insertResult) {
            $id = $connection->lastInsertId();

            return new User($id, $username);
        }

        $errorCode = $insertStatement->errorCode();

        if ($errorCode === '23000') {
            // Duplicate entry error
            // This means the username already exists

            throw new RegisterUserException("Потребителското име вече е заето");
        }

        throw new RegisterUserException("Грешка при създаване на потребител. Опитайте пак по-късно.");

        // error_log("Error inserting user: " . $errorInfo[2]);
    
    }

}