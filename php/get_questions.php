<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

require __DIR__ . '/../vendor/autoload.php';

try {
    // Connect to MongoDB
    $client = new MongoDB\Client("mongodb://127.0.0.1:27017");

    // DB and Collection
    $collection = $client->online_quiz_db->questions;

    // Fetch all questions
    $cursor = $collection->find([]);

    $questions = [];

    foreach ($cursor as $doc) {
        $questions[] = [
            "question" => $doc["question"] ?? "",
            "options"  => $doc["options"] ?? [],
            "correct"  => $doc["correct"] ?? 0
        ];
    }

    echo json_encode($questions);

} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}
?>