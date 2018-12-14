<?php $title='Inscription d\'un membre'; ?>
<?php ob_start(); ?>

<!-- Formulaire d'inscription d'un membre -->
<form method="post" action="index.php?action=addMember">
	<P>
		Pseudo
		<input type="text" name="pseudo" />
	</P>
	<p>
		Mot de passe
		<input type="password" name="pass" />
	</p>
	<p>
		Vérification du mot de passe
		<input type="password" name="pass2" />
	</p>
	<p>
		E-mail
		<input type="email" name="email" />
	</p>
	<p>
		<input type="submit" value="Valider" />
	</p>
</form>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>
