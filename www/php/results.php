<?php
session_start();
// Inclusion du fichier de configuration
require_once('config.php');

include 'functions.php';
template_header('Résultats - ENAC-Quiz !');

// Récupération des résultats de l'utilisateur
$score = 0;
$answers = $_SESSION['answers'];
$session_id = $_SESSION['session_id'];

// Récupération de la langue sélectionnée par l'utilisateur
$lang = $_SESSION['lang'];

// Préparation de la requête pour récupérer les informations de chaque question posée
$stmt = $pdo->prepare('SELECT * FROM `session_question` JOIN `question` ON `fk_question`=question.id_question WHERE `fk_session`=:session_id ORDER BY id_session_question');
$stmt->bindParam('session_id', $session_id, PDO::PARAM_INT);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage de la liste des questions posées avec les réponses données par l'utilisateur et les réponses correctes
echo '<ol>';
foreach ($questions as $question) {
    echo '<li>';
    echo '<h4>' . (isset($question['question' . $lang]) ? $question['question' . $lang] : $question['question_fr']) . '</h4>'; // Affichage de la question posée en fonction de la langue sélectionnée
    echo '<p>Votre réponse: ' . (isset($question['rep_' . $question['id_rep'] . $lang]) ? $question['rep_' . $question['id_rep'] . $lang] : '') . '</p>'; // Affichage de la réponse de l'utilisateur en fonction de la langue sélectionnée
    echo '<p>Réponse correcte: ' . (isset($question['rep_' . $question['rep_true'].$lang]) ? $question['rep_' . $question['rep_true'] . $lang] : '') . '</p>'; // Affichage de la réponse correcte en fonction de la langue sélectionnée
    if ($question['id_rep'] == $question['rep_true']) { // Si la réponse de l'utilisateur est correcte
        $score++; // Incrémentation du score
        echo '<p>Résultat: <span style="color:green">Correct</span></p>';
    } else { // Si la réponse de l'utilisateur est incorrecte
        echo '<p>Résultat: <span style="color:red">Incorrect</span></p>';
    }
    echo '</li>';
}
echo '</ol>';

// Affichage du score
echo '<h2>Votre score: ' . $score . '/' . count($questions) . '</h2>';

// Enregistrement du score dans la base de données
$stmt = $pdo->prepare('UPDATE `session` SET `score` = :score WHERE `id_session` = :session_id');
$stmt->bindParam(':score', $score, PDO::PARAM_INT);
$stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
$stmt->execute();

?>
<main class="content results">
    <form action="send_result.php" method="POST">
        <label for="email">Entrez votre adresse email pour recevoir le résultat :</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Envoyer</button>
    </form>

    <a href="/index.php">Recommencer le QCM</a>
    <br>
    <a href="scores.php">Affichage du classement</a>
</main>

<?=template_footer()?>