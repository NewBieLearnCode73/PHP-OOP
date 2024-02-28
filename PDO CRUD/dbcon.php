<?php
$servername = "localhost";
$username = "root";
$password = '';
$database = "phptutorial";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successfully";
}

// Quăng ra ngoại lệ 
catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
