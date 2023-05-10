<?php
// On démarre une session pour stocker les informations du test.
session_start();

// On inclut le fichier de configuration qui contient les identifiants de connexion à la base de données.
require_once('config.php');

include 'functions.php';
template_header('Résultats - ENAC-Quiz !');

try {
    // On se connecte à la base de données.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // On configure le mode d'erreur pour obtenir des exceptions en cas de problème.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Si la connexion échoue, on arrête le script et on affiche l'erreur.
    die("Erreur : " . $e->getMessage());
}

// On récupère les scores de chaque utilisateur dans la base de données.
$stmt = $pdo->prepare("SELECT pseudo, score, fk_difficulty FROM session ORDER BY score DESC");
$stmt->execute();
$scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tableau associatif pour stocker les scores par niveau de difficulté
$scoresByDifficulty = array();

// On parcourt les scores et on les organise par niveau de difficulté
foreach ($scores as $score) {
    $difficulty = $score['fk_difficulty'];
    if (!isset($scoresByDifficulty[$difficulty])) {
        $scoresByDifficulty[$difficulty] = array();
    }
    $scoresByDifficulty[$difficulty][] = $score;
}

// Définition de l'ordre des niveaux de difficulté
$difficultyOrder = [1, 2, 3];

// Affichage des niveaux de difficulté côte à côte
echo '<div style="display: flex; justify-content: center;">';

foreach ($difficultyOrder as $difficulty) {
    if (isset($scoresByDifficulty[$difficulty])) {
        $difficultyLabel = '';
        if ($difficulty == 1) {
            $difficultyLabel = 'Facile';
        } elseif ($difficulty == 2) {
            $difficultyLabel = 'Moyen';
        } elseif ($difficulty == 3) {
            $difficultyLabel = 'Difficile';
        }

        echo '<div style="margin-right: 40px;">'; // Ajout d'une marge à droite pour séparer les niveaux de difficulté
        echo "<h2>Niveau : $difficultyLabel</h2>";
        echo "<table>";
        echo "<tr><th>Rang</th><th>Pseudo</th><th>Score</th></tr>";
        $rank = 1;
        foreach ($scoresByDifficulty[$difficulty] as $score) {
            $pseudo = $score['pseudo'];
            $scoreValue = $score['score'];
            $isCurrentUser = ($pseudo === $_SESSION['pseudo']); // Vérifie si le score appartient à la session courante

            echo "<tr" . ($isCurrentUser ? ' style="font-weight: bold; color: red;"' : '') . ">";
            echo "<td>".$rank."</td>";
            echo "<td>".$pseudo."</td>";
            echo "<td>".$scoreValue."</td>";
            echo "</tr>";
            $rank++;
        }
        echo "</table>";
        echo '</div>';
    }
}

echo '</div>'; // Fin de l'affichage côte à côte

template_footer();
?>