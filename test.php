<?php

require_once 'bootstrap.php';

var_dump($_SESSION);


// $users = DbRequestsFactory::getInstance()->getAllUsers();

// echo json_encode($users);

$user = DbRequestsFactory::getInstance()->getUserByUsername($_GET['username'] ?? '');

echo json_encode($user);
