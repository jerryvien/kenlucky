<?php
$host = "localhost"; // Replace with Hostinger's database host
$db_name = "ken_group_db"; // Replace with your Hostinger database name
$username = "your_username"; // Your Hostinger database username
$password = "your_password"; // Your Hostinger database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>