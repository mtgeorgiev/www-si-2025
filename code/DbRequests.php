<?php

interface DbRequests
{
    public function getAllUsers(): array;

    public function getUserById(int $id): ?User;

    public function getUserByUsername(string $username): ?User;

    // public function createUser(array $userData): bool;

    // public function updateUser(int $id, array $userData): bool;

    // public function deleteUser(int $id): bool;
}
