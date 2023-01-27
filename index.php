<?php

use App\Request;

require_once __DIR__.'/vendor/autoload.php';

$request = new Request();

$userInput = $_SERVER["REQUEST_URI"];

if($userInput == "/contact") {
    include __DIR__. "/views/contact.php";
}



$routes = [
    '/' => function() {
        include 'views/home.php';
    },
    '/about' => function() {
        include 'views/about.php';
    },
    '/contact' => function() {

        if ($request-> getMethod() === 'POST') {

            //todo implement form logic

            define('REQUIRED_FIELD_ERROR', 'This field is required');
            $errors = [];

            $firstname = '';
            $lastname = '';
            $email = '';
            $subject = '';
            $message = '';


            $firstname = post_data('firstname');
            $lastname = post_data('lastname');
            $email = post_data('email');
            $subject = post_data('subject');
            $message = post_data('message');

            if (!$firstname){
            $errors['firstname'] = REQUIRED_FIELD_ERROR;
            }

            if (!$lastname){
                $errors['lastname'] = REQUIRED_FIELD_ERROR;
            }

            if (!$email){
            $errors['email'] = REQUIRED_FIELD_ERROR;
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "This field must be valid email address";
            }
            
            if (!$subject){
                $errors['subject'] = REQUIRED_FIELD_ERROR;
            }

            if (!$message){
                $errors['message'] = REQUIRED_FIELD_ERROR;
            }

            // Save to db

            require_once "db-config.php";

            $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

            // Check connection
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }


            $sql = $connection->prepare("
            INSERT INTO
                    contact (firstname, lastname, email, subject_text, client_message)
                    VALUES (?, ?, ?, ?, ?)
                ");



            $sql->bind_param("sssss", $firstname, $lastname, $email, $subject, $message);

            $sql->execute();
            $sql->close();

            function post_data($field)
            {
                $_POST[$field] ??= false;
                
                return htmlspecialchars(stripslashes($_POST[$field]));
            }

        }
        // If only HTTP GET Request is happening
        include 'views/contact.php';
    },
    '/projects' => function() {
        include 'views/projects.php';
    }

];

$path = $_SERVER['REQUEST_URI'];

if (!empty($routes[$path])) {
    call_user_func($routes[$path]);
}


