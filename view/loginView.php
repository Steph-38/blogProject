<?php $title = "Connexion d'un membre"; ?>
<?php ob_start(); ?>

<!-- Formulaire de connexion d'un membre -->
<form method="post" action="index.php?action=login">
	<p>
		Pseudo
		<input type="text" name="pseudo" />
	</p>
	<p>
		Mot de passe
		<input type="password" name="pass" />
	</p>
	<p>
		<input type="submit" value="Se connecter" />
	</p>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>
