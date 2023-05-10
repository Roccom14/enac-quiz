<?php
// On démarre une session pour stocker les informations du test.
session_start();
include 'php/functions.php';
// On inclut le fichier de configuration qui contient les identifiants de connexion à la base de données.
require_once('php/config.php');

try {
    // On se connecte à la base de données.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // On configure le mode d'erreur pour obtenir des exceptions en cas de problème.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Si la connexion échoue, on arrête le script et on affiche l'erreur.
    die("Erreur : " . $e->getMessage());
}

// Si le formulaire a été soumis.
if (!empty($_POST)) {
    // On récupère les valeurs des champs envoyés par le formulaire.
    $lang = $_POST['lang'] ?? '';
    $pseudo = $_POST['pseudo'] ?? '';
    $difficulty = $_POST['difficulty'] ?? '';
    $score = $_POST['score'] ?? null;
    $answers = $_POST['answers'] ?? [];

    // On vérifie que la difficulté est un entier valide.
    if (!filter_var($difficulty, FILTER_VALIDATE_INT)) {
        // Si ce n'est pas le cas, on arrête le script et on affiche un message d'erreur.
        die("La difficulté n'est pas valide.");
    }

    // On vérifie que le champ pseudo n'est pas vide.
    if (empty($pseudo)) {
        // Si c'est le cas, on arrête le script et on affiche un message d'erreur.
        die("Le champ Pseudo est obligatoire.");
    }

    // On prépare une requête d'insertion dans la table session avec les informations du test.
    $stmt = $pdo->prepare("INSERT INTO session (pseudo, score, fk_difficulty) VALUES (?, 0, ?)");
    // On exécute la requête en passant les valeurs correspondantes.
    $stmt->execute([$pseudo, $difficulty]);

    // On récupère l'identifiant de la session qui vient d'être créée.
    $session_id = $pdo->lastInsertId();
    // On stocke l'identifiant de la session dans la variable de session.
    $_SESSION['session_id'] = $session_id;
    // On stocke les autres informations du test dans des variables de session.
    $_SESSION['lang'] = $lang;
    $_SESSION['difficulty'] = $difficulty;
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['score'] = 0;
    $_SESSION['answers'] = array();
    $_SESSION['current_question'] = 0;

    // On redirige l'utilisateur vers la page des questions du test.
    header('Location: php/questions.php');
    // On arrête l'exécution du script.
    exit();
}
template_header('Accueil - ENAC-Quiz !');
?>

<!-- On affiche le formulaire de démarrage du test. -->
<main class="content start_test">
    <form method="post" action="">
        <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" required>
        </div>
        <div>
            <label for="lang">Langue :</label>
            <select id="lang" name="lang">
                <option value="_fr" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == '_fr') echo 'selected'; ?>>Français</option>
                <option value="_en" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == '_en') echo 'selected'; ?>>Anglais</option>
            </select>
        </div>
        <div>
            <label for="difficulty">Difficulté :</label>
            <select id="difficulty" name="difficulty">
                <option value="1" <?php if(isset($_SESSION['difficulty']) && $_SESSION['difficulty'] == '1') echo 'selected'; ?>>Facile</option>
                <option value="2" <?php if(isset($_SESSION['difficulty']) && $_SESSION['difficulty'] == '2') echo 'selected'; ?>>Moyen</option>
                <option value="3" <?php if(isset($_SESSION['difficulty']) && $_SESSION['difficulty'] == '3') echo 'selected'; ?>>Difficile</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Commencer">
        </div>
    </form>
</main>

<?=template_footer()?>