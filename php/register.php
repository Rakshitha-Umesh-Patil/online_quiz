<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$users = $client->online_quiz->users;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$users->insertOne([
    'username'=>$username,
    'email'=>$email,
    'password'=>$password
]);

echo "Registered successfully! Now login.";