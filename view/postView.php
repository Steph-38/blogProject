<?php $title='Les commentaires'; ?>
<?php ob_start(); ?>


<div class="news"> 
    <h3>
    	<?= htmlspecialchars($post['title'])?>
    	le <?= $post['creation_date_fr']?>
    </h3>
    <p>
    	<?= nl2br(htmlspecialchars($post['content']))?>
    </p>
</div>

<h2>Commentaires</h2>
<?php 
while ($comment = $comments->fetch()) {
?>
	<p>
		<b><?= htmlspecialchars($comment['author'])?></b>
		le <?= $comment['comment_date_fr']?>	
	</p>
	<p>
		<?= nl2br(htmlspecialchars($comment['comment']))?>
	</p>
<?php
}
?>

<!-- formulaire d'ajout des commentaires !-->
<form method="post" action="index.php?action=addComment&amp;id=<?= $post['id']?>">
	<p>
		<label for="comment">Commentaire</label><br />
		<textarea id="comment" name="comment" rows="4" cols="28"></textarea>
	</p>
	<p>
		<input type="submit" />
	</p>
</form>


<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>
