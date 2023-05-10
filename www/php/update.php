<?php
include 'functions_admin.php';
//$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id_question'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id_question = isset($_POST['id_question']) ? $_POST['id_question'] : NULL;
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
        // Update the record
        $stmt = $pdo->prepare('UPDATE question SET id_question = ?, question_fr = ?, question_en = ?, rep_1_fr = ?, rep_1_en = ?, rep_2_fr = ?, rep_2_en = ?, rep_3_fr = ?, rep_3_en = ?, rep_4_fr = ?, rep_4_en = ?, rep_true = ?, media = ?, fk_category = ?, fk_difficulty = ? WHERE id_question = ?');
        $stmt->execute([$id_question, $question_fr, $question_en, $rep_1_fr, $rep_1_en, $rep_2_fr, $rep_2_en, $rep_3_fr, $rep_3_en, $rep_4_fr, $rep_4_en, $rep_true, $media, $fk_category, $fk_difficulty, $_GET['id_question']]);
        $msg = 'Question mise à jour avec succès !';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM question WHERE id_question = ?');
    $stmt->execute([$_GET['id_question']]);
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        exit('Aucune question avec cet ID !');
    }
} else {
    exit('ID non spécifié');
}
?>

<?=template_header('Read')?>

<div class="back_pagination">
    <a href="read.php"><i class="fas fa-angle-double-left fa-sm"></i></a>
</div>

<div class="content update">
	<h2>Question à mettre à jour #<?=$question['id_question']?></h2>
    <form action="update.php?id_question=<?=$question['id_question']?>" method="post">
        <label for="id_question">ID</label>
        <label for="media">Média</label>
        <input type="text" name="id_question" value="<?=$question['id_question']?>">
        <input type="text" name="media" value="<?=$question['media']?>">
        
        <label for="question_fr">Question FR</label>
        <label for="question_en">Question EN</label>
        <input type="text" name="question_fr" value="<?=$question['question_fr']?>">
        <input type="text" name="question_en" value="<?=$question['question_en']?>">

        <label for="rep_1_fr">Réponse 1 FR</label>
        <label for="rep_1_en">Réponse 1 EN</label>
        <input type="text" name="rep_1_fr" value="<?=$question['rep_1_fr']?>">
        <input type="text" name="rep_1_en" value="<?=$question['rep_1_en']?>">

        <label for="rep_2_fr">Réponse 2 FR</label>
        <label for="rep_2_en">Réponse 2 EN</label>
        <input type="text" name="rep_2_fr" value="<?=$question['rep_2_fr']?>">
        <input type="text" name="rep_2_en" value="<?=$question['rep_2_en']?>">
        
        <label for="rep_3_fr">Réponse 3 FR</label>
        <label for="rep_3_en">Réponse 3 EN</label>
        <input type="text" name="rep_3_fr" value="<?=$question['rep_3_fr']?>">
        <input type="text" name="rep_3_en" value="<?=$question['rep_3_en']?>">

        <label for="rep_4_fr">Réponse 4 FR</label>
        <label for="rep_4_en">Réponse 4 EN</label>
        <input type="text" name="rep_4_fr" value="<?=$question['rep_4_fr']?>">
        <input type="text" name="rep_4_en" value="<?=$question['rep_4_en']?>">

        <label for="fk_category">Catégorie</label>
        <label for="fk_difficulty">Difficulté</label>
        <input type="text" name="fk_category" value="<?=$question['fk_category']?>">
        <input type="text" name="fk_difficulty" value="<?=$question['fk_difficulty']?>">

        <label for="rep_true">Réponse Juste</label>
        <input type="text" name="rep_true" value="<?=$question['rep_true']?>">
        <input type="submit" value="Mettre à jour">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
