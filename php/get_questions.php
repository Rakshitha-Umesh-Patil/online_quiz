<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$collection = $client->online_quiz_db->questions;

$subject = $_GET['subject'] ?? '';

$cursor = $collection->find([
    "subject" => $subject
]);

$questions = [];

foreach ($cursor as $doc) {
    $questions[] = [
        "question" => $doc["question"],
        "options"  => $doc["options"],
        "correct"  => $doc["correct"]
    ];
}

echo json_encode($questions);
?>