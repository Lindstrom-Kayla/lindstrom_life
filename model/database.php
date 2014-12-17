<?php

$server = 'localhost';
$dbname = 'lindstro_life';
$dsn = 'mysql:host=' . $server . ';dbname=' . $dbname;
$username = 'lindstro';
$password = 'NewportTemple30!';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('errors/db_error.php');
    exit();
}
