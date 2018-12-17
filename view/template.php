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
		
		<header>
    		<h1>WELCOME TO THE BLOG !</h1>
    		<p>
    			<a href="index.php">Accueil</a>
    			<a href="index.php?action=viewMember">Inscription</a>
    			<a href="index.php?action=viewLogin">Connexion</a>
    			<a href="index.php?action=logout">Déconnexion</a>
    		</p>
		</header>

		<?php
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
		    echo $_SESSION['pseudo'] . ' est avec nous !';
		}
		?>
    	<?= $content ?>
    </body>
</html>
