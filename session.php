<?php

require_once 'bootstrap.php';

$response = null;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $response['is_logged_in'] = Session::isLoggedIn();

        break;
    case 'POST':

        // when the request sends json data
        $input = json_decode(file_get_contents('php://input'), true);

        // when the request sends form data
        // $input = $_POST;


        $username = $input['username'] ?: null;
        $password = $input['password'] ?: null;

        // some code that checks if the username and password are correct
        Session::login($username);
        $response['success'] = true;

        break;

    case 'DELETE':

        Session::logout();
        $response['success'] = true;
        break;
}

echo json_encode($response);