<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8" />
    	<title>Attention</title>
    	<link href="public/style.css" rel="stylesheet" />
    </head>
    <body>
		
		<header>
    		<h1>WELCOME TO THE BLOG !</h1>
    		<div class=navigation>
    			<a href="index.php">Accueil</a><a href="index.php?action=viewMember">Inscription</a><a href="index.php?action=viewLogin">Connexion</a><a href="index.php?action=logout">Déconnexion</a><a href="https://fr.lipsum.com/" title="Lien vers le site lipsum.com" target="_blank">Lorem</a>
			</div>
    		<?php
    		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
    		    echo $_SESSION['pseudo'] . ' est avec nous !';
    		} 
    		else {
    		    echo 'Connexion obligatoire pour commenter un article';
    		}
    		?>
    		
    		<h2><?= $errorMessage?></h2>
		</header>

    </body>
</html>


