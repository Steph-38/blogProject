<?php $title="Ajouter un article"; ?>
<?php ob_start();?>

<!-- Formulaire d'ajout d'un article -->
<form method="post" action="index?action=addPost">
	<p>
		<label for="title">Titre</label>
		<input id="title" type="text" name="title" />
	</p>
	<p>
		<label for="post">Article</label>
		<textarea id="post" name="post" rows="10" cols="35"></textarea>
	</p>
	<p>
		<input type="submit" value="Poster" />
	</p>
</form>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>
