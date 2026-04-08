<?php
require '../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->online_quiz_db;
$users = $db->users;
?>