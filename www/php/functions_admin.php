<?php
require_once 'config.php';
function template_header($title) {
echo <<<EOT

<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<title>$title</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="/css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<header>
    		<nav class="navtop">
				<div class="container">
					<a href="/index.php"><img src="/media/epfl.jpg" alt="Logo EPFL" class="logo"></a>
					<a href="/php/scores.php">Scores</a>
					<a href="/php/logout.php">Déconnexion</a>
				</div>
    		</nav>
		</header>
EOT;
}
function template_footer() {
echo <<<EOT
		<footer>
			<div class="container">
				<p>© 2023 EPFL, tous droits réservés</p>
			</div>
		</footer>
		<script src="../js/script.js"></script>
    </body>
</html>
EOT;
}
?>