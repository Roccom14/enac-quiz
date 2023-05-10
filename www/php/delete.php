<?php
include 'functions_admin.php';
//$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id_question'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM question WHERE id_question = ?');
    $stmt->execute([$_GET['id_question']]);
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        exit('Aucune question existante avec cet ID !');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM question WHERE id_question = ?');
            $stmt->execute([$_GET['id_question']]);
            $msg = 'Vous avez supprimé cette question avec succès !';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('Aucun ID spécifié !');
}
?>

<?=template_header('Delete')?>

<div class="back_pagination">
    <a href="read.php"><i class="fas fa-angle-double-left fa-sm"></i></a>
</div>

<div class="content delete">
	<h2>Question à supprimer #<?=$question['id_question']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Êtes-vous sûr de vouloir supprimer cette question #<?=$question['id_question']?>?</p>
    <div class="yesno">
        <a href="delete.php?id_question=<?=$question['id_question']?>&confirm=yes" class="yes">Oui</a>
        <a href="delete.php?id_question=<?=$question['id_question']?>&confirm=no" class="no">Non</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>