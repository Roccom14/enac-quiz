<?php

$host = "mysql"; // Le host est le nom du service, présent dans le docker-compose.yml
$dbname = "enac-quiz";
$charset = "utf8";
$port = "3306";

try {
    $pdo = new PDO(
        dsn: "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
        username: "root",
        password: "test",
    );
    $question = $pdo->query("SELECT * FROM question");
    echo '<pre>';
    foreach ($question->fetchAll(PDO::FETCH_ASSOC) as $quest) {
        print_r($quest);
    }
    echo '</pre>';
} catch (PDOException $e) {
    throw new PDOException(
        message: $e->getMessage(),
        code: (int)$e->getCode()
    );
}
?>