<?php
// On démarre une session pour stocker les informations du test.
session_start();

// On inclut le fichier de configuration qui contient les identifiants de connexion à la base de données.
require_once('config.php');
include 'functions.php';

template_header('Nouveau test - ENAC-Quiz !');

// Initialisation de la variable $results qui sera utilisée plus tard
$results = array();

// Vérification de la langue choisie et du niveau de difficulté
// Si la langue a été choisie précédemment, on la récupère depuis la session, sinon on met la valeur '_fr' par défaut
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = '_fr';
}

// Si le niveau de difficulté a été choisi précédemment et est compris entre 1 et 3 inclus, on le récupère depuis la session, sinon on met la valeur 1 par défaut
if (isset($_SESSION['difficulty']) && ($_SESSION['difficulty'] >= 1 && $_SESSION['difficulty'] <= 3)) {
    $difficulty = $_SESSION['difficulty'];
} else {
    $difficulty = 1;
}

// Stockage de la langue choisie dans la session
$_SESSION['lang'] = $lang;

// Récupération des questions et des réponses pour le niveau de difficulté et la langue choisie
$stmt = $pdo->prepare('SELECT id_question, question'.$lang.', rep_true, rep_1'.$lang.', rep_2'.$lang.', rep_3'.$lang.', rep_4'.$lang.', fk_difficulty FROM question WHERE fk_difficulty = :difficulty ORDER BY RAND() LIMIT 20');
$stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérification d'éventuelles erreurs lors de l'exécution de la requête SQL
if($stmt->errorInfo()[0] !== '00000'){
    print_r($stmt->errorInfo()); // Affichage du message d'erreur
    die(); // Arrêt du script en cas d'erreur
}

// Stockage des questions et réponses dans la session
$_SESSION['questions'] = $questions;

// Récupération ou génération d'un identifiant de session
if (isset($_SESSION['id_session'])) {
    $id_session = $_SESSION['id_session'];
} else {
    // Insertion d'un nouveau enregistrement dans la table `session` avec un pseudo 'anonymous' et un score initial de 0
    $stmt = $pdo->prepare('INSERT INTO session (pseudo, score, fk_difficulty) VALUES (:pseudo, :score, :difficulty)');
    $stmt->bindValue(':pseudo', 'anonymous');
    $stmt->bindValue(':score', 0);
    $stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
    $stmt->execute();
    $id_session = $pdo->lastInsertId(); // Récupération de l'identifiant de la nouvelle session
    $_SESSION['id_session'] = $id_session; // Stockage de l'identifiant de la session dans la session
}

// Récupération de l'index de la question courante dans la session
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0; // Si l'index n'existe pas, on met la valeur 0 par défaut
}

// Récupération de la question courante
$current_question = $questions[$_SESSION['current_question']];
?>

<main>
    <div class="question">
        <h3><?php echo $current_question['question' . $lang]; ?></h3>
        <form action="check_answer.php" method="post" id="answer-form">
            <input type="hidden" name="id_question" value="<?php echo $current_question['id_question']; ?>">
            <input type="hidden" name="rep_true" value="<?php echo $current_question['rep_true']; ?>">
            <input type="hidden" name="lang" value="<?php echo $lang; ?>">
            <input type="hidden" name="difficulty" value="<?php echo $difficulty; ?>">
            <ul>
                <li><input type="radio" name="answer" value="1" required><?php echo $current_question['rep_1' . $lang]; ?></li>
                <li><input type="radio" name="answer" value="2" required><?php echo $current_question['rep_2' . $lang]; ?></li>
                <li><input type="radio" name="answer" value="3" required><?php echo $current_question['rep_3' . $lang]; ?></li>
                <li><input type="radio" name="answer" value="4" required><?php echo $current_question['rep_4' . $lang]; ?></li>
            </ul>
            <input type="submit" value="Valider">
        </form>
    </div>
    <p>Temps restant : <span id="timer">60</span> secondes</p>
    <script>
        window.onload = function (){
            startTimer();
        };
    </script>
</main>

<?=template_footer()?>