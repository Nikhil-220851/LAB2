<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

$db = $client->authDB; // database name
$collection = $db->Users; // collection name

?>