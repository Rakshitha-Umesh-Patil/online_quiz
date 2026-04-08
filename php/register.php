<?php
require __DIR__ . '/../vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->online_quiz_db->users;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// check existing
$existing = $collection->findOne(['email' => $email]);
if($existing){
    echo "Email already registered";
    exit;
}

$collection->insertOne([
    'username' => $username,
    'email' => $email,
    'password' => $password
]);

echo "Registration successful";
?>