<?php

$user = "root";
$hostName = "localhost";
$dbname = "svi_passport";
$pass = "root";
try {
    $conn = new PDO("mysql:host=$hostName;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "DB connected";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
