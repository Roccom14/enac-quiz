<?php
include 'functions_admin.php';

// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Number of records to show on each page
$records_per_page = 10;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM question ORDER BY id_question LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records so we can display them in our template.
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of question, this is so we can determine whether there should be a next and previous button
$num_question = $pdo->query('SELECT COUNT(*) FROM question')->fetchColumn();
?>

<?=template_header('Affichage - Questions')?>

<div class="content read">
	<h2>Questions</h2>
	<a href="create.php" class="create-question">Créer une question</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Question FR</td>
                <td>Question EN</td>
                <td>Réponse 1 FR</td>
                <td>Réponse 1 EN</td>
                <td>Réponse 2 FR</td>
                <td>Réponse 2 EN</td>
                <td>Réponse 3 FR</td>
                <td>Réponse 3 EN</td>
                <td>Réponse 4 FR</td>
                <td>Réponse 4 EN</td>
                <td>Réponse Juste</td>
                <td>Média</td>
                <td>Catégorie</td>
                <td>Difficulté</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td><?=$question['id_question']?></td>
                <td><?=$question['question_fr']?></td>
                <td><?=$question['question_en']?></td>
                <td><?=$question['rep_1_fr']?></td>
                <td><?=$question['rep_1_en']?></td>
                <td><?=$question['rep_2_fr']?></td>
                <td><?=$question['rep_2_en']?></td>
                <td><?=$question['rep_3_fr']?></td>
                <td><?=$question['rep_3_en']?></td>
                <td><?=$question['rep_4_fr']?></td>
                <td><?=$question['rep_4_en']?></td>
                <td><?=$question['rep_true']?></td>
                <td><?=$question['media']?></td>
                <td><?=$question['fk_category']?></td>
                <td><?=$question['fk_difficulty']?></td>
                <td class="actions">
                    <a href="update.php?id_question=<?=$question['id_question']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id_question=<?=$question['id_question']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_question): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>