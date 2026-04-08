<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->online_quiz_db->users;

// ✅ prevent undefined warnings
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if($email == '' || $password == ''){
    echo "Form data missing";
    exit;
}

$user = $collection->findOne([
    'email' => $email,
    'password' => $password
]);

if($user){
    echo "success";
} else {
    echo "Invalid credentials";
}
?>