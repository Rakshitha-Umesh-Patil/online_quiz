<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$users = $client->online_quiz->users;

$email = $_POST['email'];
$password = $_POST['password'];

$user = $users->findOne(['email'=>$email,'password'=>$password]);

if($user){
    echo "success";
}else{
    echo "Invalid login!";
}