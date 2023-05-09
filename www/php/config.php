<?php
// Set database credentials
$host = "mysql"; // Le host est le nom du service, présent dans le docker-compose.yml
$dbname = "enac-quiz";
$charset = "utf8";
$port = "3306";
$username = "root";
$password = "test";

try {
    // Connect to the database
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
        $username,
        $password
    );
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
