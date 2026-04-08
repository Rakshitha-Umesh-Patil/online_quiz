<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$db = $client->online_quiz_db;
$collection = $db->scores;

$cursor = $collection->find([], [
    'sort' => ['score' => -1]
]);

$result = [];

foreach ($cursor as $doc) {
    $result[] = [
        'username' => $doc['username'],
        'score' => $doc['score']
    ];
}

echo json_encode($result);
?>