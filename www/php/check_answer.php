<?php
// Démarrage de la session
session_start();

// Inclusion du fichier de configuration
require_once('config.php');

// Récupération de l'index de la question courante dans la session
$current_question = $_SESSION['current_question'];

// Récupération de la réponse de l'utilisateur
if (isset($_POST['answer'])) { // Vérification de la présence de la réponse dans la variable POST
    $answer = $_POST['answer']; // Stockage de la réponse de l'utilisateur
} else {
    $answer = null; // Si la réponse est absente, initialisation à null
}

// Prépare une requête d'insertion en base de données pour stocker la réponse de l'utilisateur
$stmt = $pdo->prepare("INSERT INTO session_question (fk_session, fk_question, id_rep) VALUES (:fk_session,:fk_question,:id_rep)");
$stmt->bindParam(':fk_session', $_SESSION['session_id'], PDO::PARAM_INT); // Liaison du paramètre fk_session
$stmt->bindParam(':fk_question', $_SESSION['questions'][$current_question]['id_question'], PDO::PARAM_INT); // Liaison du paramètre fk_question
$stmt->bindParam(':id_rep', $answer, PDO::PARAM_INT); // Liaison du paramètre id_rep
$stmt->execute(); // Exécution de la requête

// Stockage de la réponse de l'utilisateur dans le tableau des réponses
$_SESSION['answers'][$current_question] = $answer;

// Passage à la question suivante
$_SESSION['current_question']++;

// Vérification de la fin du questionnaire
if ($_SESSION['current_question'] == 20) {
    // Redirection vers la page de résultats
    header('Location: results.php');
    exit(); // Arrêt de l'exécution du script
} else {
    // Redirection vers la page de la prochaine question
    header('Location: questions.php');
    exit(); // Arrêt de l'exécution du script
} 
?>