<?php
$host = "localhost"; // Replace with Hostinger's database host
$db_name = "u737908269_lucky2024"; // Replace with your Hostinger database name
$username = "u737908269_root"; // Your Hostinger database username
$password = "$1Rv1r@dmInS"; // Your Hostinger database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>