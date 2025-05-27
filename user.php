<?php

require_once 'bootstrap.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        break;

    case 'POST':
        // register a new user
        
        $input = json_decode(file_get_contents('php://input'), true);
        $username = $input['username'] ?? null;
        $password = $input['password'] ?? null;
        
        // data validation

        $insertedUser = DbRequestsFactory::getInstance()->insertUser($username, $password);

        if ($insertedUser) {
            $response = $insertedUser;
        } else {
            $response = ['error' => 'Failed to create user'];
        }

        break;

    default:
        http_response_code(405); // Method Not Allowed
        $response = ['error' => 'Method not allowed'];
    }

echo json_encode($response);