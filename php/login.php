<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->online_quiz_db->users;

header('Content-Type: application/json');

// Get form data safely
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    echo json_encode([
        "status" => "error",
        "message" => "Form data missing"
    ]);
    exit;
}

// Find user
$user = $collection->findOne([
    'email' => $email,
    'password' => $password
]);

if ($user) {
    echo json_encode([
        "status" => "success",
        "username" => $user['username']  // ✅ VERY IMPORTANT
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid credentials"
    ]);
}
?>