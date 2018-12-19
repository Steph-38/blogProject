<?php $title='Inscription d\'un membre'; ?>
<?php ob_start(); ?>

<!-- Formulaire d'inscription d'un membre -->
<form method="post" action="index.php?action=addMember">
	<P>
		<label for="pseudo">Pseudo</label><br />
		<input type="text" id="pseudo" name="pseudo" maxlength="10"/>
	</P>
	<p>
		<label for="passe">Mot de passe</label><br />
		<input type="password" id="passe" name="pass" maxlength="20" size="30"/>
	</p>
	<p>
		<label for="passe2">Vérification du mot de passe</label><br />
		<input type="password" id="passe2" name="pass2" maxlength="20" size="30"/>
	</p>
	<p>
		<label for="email">E-mail</label><br />
		<input type="email" id="email" name="email" maxlength="254" size="30"/>
	</p>
	<p>
		<input type="submit" value="Valider" />
	</p>
</form>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>
