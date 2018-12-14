<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8" />
    	<title><?= $title ?></title>
    	<link href="public/style.css" rel="stylesheet" />
    </head>
    <body>
		<h1>WELCOME TO THE BLOG !</h1>
		<?php
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
		    echo $_SESSION['pseudo'] . ' est avec nous !';
		}
		?>
		<p><a href="index.php">Retour à la liste des billets</a></p>
    	<p><a href="index.php?action=viewMember">Inscription</a></p>
    	<p><a href="index.php?action=viewConnexion">Connexion</a></p>
    	<p><a href="index.php?action=logout">Déconnexion</a></p>
    	<?= $content ?>
    </body>
</html>
