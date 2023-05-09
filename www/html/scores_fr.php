<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>Scores - ENAC-Quiz !</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<nav>
			<div class="container">
				<a href="index_fr.html"><img src="../media/epfl.jpg" alt="Logo EPFL" class="logo"></a>
				<a href="index_fr.html">Accueil</a>
				<a href="new_test_fr.html">Test</a>
				<a href="scores_fr.html">Scores</a>
                <a href="admin_login_fr.html">Login</a>
			</div>
			<div class="language-selector">
				<select name="language" id="language">
				  <option value="FR">FR</option>
				  <option value="EN">EN</option>
				</select>
			</div>
		</nav>
	</header>
	<main>
		<div class="content">
			<h1>Scores</h1>
			<?php
				require_once('../php/config.php');

				// Récupération des scores depuis la base de données
				$sql = "SELECT pseudo, score FROM `session` ORDER BY score DESC";
				$resultat = $pdo->query($sql);
			?>

			<table class="score">
				<tr>
					<th>Utilisateur</th>
					<th>Score</th>
				</tr>
				<?php foreach ($resultat as $ligne) {
						echo "<tr><td>" . $ligne['pseudo'] . "</td><td>" . $ligne['score'] . "</td></tr>";
				}?>
			</table>
		</div>
	</main>
	<footer>
		<div class="container">
			<p>© 2023 EPFL, tous droits réservés</p>
		</div>
	</footer>
	<script src="../js/script.js"></script>
</body>
</html>