<?php
// db.php - Database connection file using PDO with variables

$db_type = 'mysql';
$db_host = 'localhost';
$db_name = 'auth_db';
$db_user = 'root';
$db_pass = '';

try {
    // Create a PDO instance
    $conn = new PDO("$db_type:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
?>
