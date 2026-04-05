<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");

$db = $client->online_quiz_db;   // ✅ correct DB
$scores = $db->scores;

$cursor = $scores->find([], [
    'sort' => ['score' => -1],
    'limit' => 10
]);

$data = [];

foreach ($cursor as $doc) {
    $data[] = [
        'username' => $doc['username'],
        'score' => $doc['score']
    ];
}

echo json_encode($data);