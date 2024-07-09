<?php

$dsn = "mysql:host=localhost;dbname=myfirstdb";
$dbusername = "druif";
$dbpassword = "98052001A!";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
