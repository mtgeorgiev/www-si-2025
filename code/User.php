<?php

class User implements JsonSerializable{

    private $id;

    private $username;

    public function __construct($id, $username) {
        $this->id = $id;
        $this->username = $username;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function __toString() {
        return "User ID: {$this->id}, Username: {$this->username}";
    }

    public static function fromArray($data) {
        return new User($data['id'], $data['username']);
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'helloMessage' => "Hello, {$this->username}!",
        ];
    }

}