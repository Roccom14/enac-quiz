<!DOCTYPE html>
<html>
<head>
    <title>Insert Page page</title>
</head>
        <?php
        //session_start();
        require_once('config.php');

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
        
            
        try {
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
