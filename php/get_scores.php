<?php
include 'connect.php';

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