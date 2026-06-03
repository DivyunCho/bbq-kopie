<?php
$localhost = "localhost";
$username = "bbq_kar";
$password = "de_bbq_kar_wachtwoord";
$database = "bbq_kar";

$conn = new PDO("mysql:host=$localhost;dbname=$database;charset=utf8mb4", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

?>