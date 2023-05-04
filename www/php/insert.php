<!DOCTYPE html>
<html>
<head>
    <title>Insert Page page</title>
</head>
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

        // Taking all values from the form data(input)
        $pseudo = $_REQUEST['pseudo'];
        $score = 0;
        $fk_difficulty = $_POST['difficulty'];
        

        // Performing insert query execution
        $sql = "INSERT INTO session (pseudo, score, fk_difficulty) VALUES (:pseudo, :score, :fk_difficulty)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':score', $score);
        $stmt->bindParam(':fk_difficulty', $fk_difficulty);
        
            
        if($stmt->execute()){
            echo "<h3>data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";

            echo nl2br("$pseudo");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
            . $pdo->errorInfo();
        }
            
        } catch(PDOException $e) {
            die("Error inserting data into the database: " . $e->getMessage());
        }
        
        // Close connection
        $pdo = null;
        ?>
</html>
