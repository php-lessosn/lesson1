<?php
session_start();

$user = ["email" => "1", "password" => "2", "name" => "Anton", "token" => "123456"];

$email = $_POST["email"];
$password = $_POST["password"];

if ($user["email"] === $email && $password === $user["password"]) {
    echo $user["token"];
} else {
    echo "Auth fail";
}



