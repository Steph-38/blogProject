<?php $title = "Connexion d'un membre"; ?>
<?php ob_start(); ?>

<!-- Formulaire de connexion d'un membre -->
<form method="post" action="index.php?action=login">
	<P>
		<label for="pseudo">Pseudo</label><br />
		<input type="text" id="pseudo" name="pseudo" maxlength="10"/>
	</P>
	<p>
		<label for="passe">Mot de passe</label><br />
		<input type="password" id="passe" name="pass" maxlength="20" size="30"/>
	</p>
	<p>
		<input type="submit" value="Se connecter" />
	</p>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>
