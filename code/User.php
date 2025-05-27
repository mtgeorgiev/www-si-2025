<?php

class User implements JsonSerializable{

    private $id;

    private $username;

    public function __construct($id, $username, $password = null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function __toString() {
        return "User ID: {$this->id}, Username: {$this->username}";
    }

    public static function fromArray($data) {
        return new User($data['id'], $data['username'], $data['password'] ?? null);
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'username' => $this->username
        ];
    }

}