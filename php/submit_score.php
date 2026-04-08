<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$db = $client->online_quiz_db;
$scores = $db->scores;

$username = $_POST['username'] ?? '';
$score = intval($_POST['score'] ?? 0);

if($username == '' || $score == 0){
    echo "Data missing";
    exit;
}

$scores->insertOne([
    'username' => $username,
    'score' => $score,
    'time' => new MongoDB\BSON\UTCDateTime()
]);

echo "success";
?>