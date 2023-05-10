<?php
include 'functions_admin.php';
//$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id_question = isset($_POST['id_question']) && !empty($_POST['id_question']) && $_POST['id_question'] != 'auto' ? $_POST['id_question'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $question_fr = isset($_POST['question_fr']) ? $_POST['question_fr'] : '';
    $question_en = isset($_POST['question_en']) ? $_POST['question_en'] : '';
    $rep_1_fr = isset($_POST['rep_1_fr']) ? $_POST['rep_1_fr'] : '';
    $rep_1_en = isset($_POST['rep_1_en']) ? $_POST['rep_1_en'] : '';
    $rep_2_fr = isset($_POST['rep_2_fr']) ? $_POST['rep_2_fr'] : '';
    $rep_2_en = isset($_POST['rep_2_en']) ? $_POST['rep_2_en'] : '';
    $rep_3_fr = isset($_POST['rep_3_fr']) ? $_POST['rep_3_fr'] : '';
    $rep_3_en = isset($_POST['rep_3_en']) ? $_POST['rep_3_en'] : '';
    $rep_4_fr = isset($_POST['rep_4_fr']) ? $_POST['rep_4_fr'] : '';
    $rep_4_en = isset($_POST['rep_4_en']) ? $_POST['rep_4_en'] : '';
    $rep_true = isset($_POST['rep_true']) ? $_POST['rep_true'] : '';
    $media = isset($_POST['media']) ? $_POST['media'] : '';
    $fk_category = isset($_POST['fk_category']) ? $_POST['fk_category'] : '';
    $fk_difficulty = isset($_POST['fk_difficulty']) ? $_POST['fk_difficulty'] : '';
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO question VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id_question, $question_fr, $question_en, $rep_1_fr, $rep_1_en, $rep_2_fr, $rep_2_en, $rep_3_fr, $rep_3_en, $rep_4_fr, $rep_4_en, $rep_true, $media, $fk_category, $fk_difficulty]);
    // Output message
    $msg = 'Question créée avec succès !';
}
?>

<?=template_header('Créer une question')?>
<div class="back_pagination">
    <a href="read.php"><i class="fas fa-angle-double-left fa-sm"></i></a>
</div>
<div class="content update">
	<h2>Créer une question</h2>
    <form action="create.php" method="post">
        <label for="id_question">ID</label>
        <label for="media">Média</label>
        <input type="text" name="id_question" value="auto">
        <input type="text" name="media">
        
        <label for="question_fr">Question FR</label>
        <label for="question_en">Question EN</label>
        <input type="text" name="question_fr">
        <input type="text" name="question_en">

        <label for="rep_1_fr">Réponse 1 FR</label>
        <label for="rep_1_en">Réponse 1 EN</label>
        <input type="text" name="rep_1_fr">
        <input type="text" name="rep_1_en">

        <label for="rep_2_fr">Réponse 2 FR</label>
        <label for="rep_2_en">Réponse 2 EN</label>
        <input type="text" name="rep_2_fr">
        <input type="text" name="rep_2_en">
        
        <label for="rep_3_fr">Réponse 3 FR</label>
        <label for="rep_3_en">Réponse 3 EN</label>
        <input type="text" name="rep_3_fr">
        <input type="text" name="rep_3_en">

        <label for="rep_4_fr">Réponse 4 FR</label>
        <label for="rep_4_en">Réponse 4 EN</label>
        <input type="text" name="rep_4_fr">
        <input type="text" name="rep_4_en">

        <label for="fk_category">Catégorie</label>
        <label for="fk_difficulty">Difficulté</label>
        <input type="text" name="fk_category">
        <input type="text" name="fk_difficulty">

        <label for="rep_true">Réponse Juste</label>
        <input type="text" name="rep_true">
        <input type="submit" value="Créer">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>