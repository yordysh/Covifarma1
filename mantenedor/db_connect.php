<?php
$servername = "DESKTOP-C8GLM7A";
$database = "monitoring";
$username = "sa";
$password = "123";
try {
    $conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
