<?php
// sample/databases/config.php

// Database credentials
$host = 'localhost'; // Database host
$dbname = 'simple';  // Database name
$username = 'root';   // Database username
$password = '';       // Database password (default for XAMPP is empty)

// Set up the PDO (PHP Data Object) for database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If the connection fails, display an error message
    die("Connection failed: " . $e->getMessage());
}
?>
