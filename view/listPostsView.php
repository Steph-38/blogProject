<?php $title='Welcome to the Blog';?>

<?php ob_start();?>
	
<div class="news">
	<?php 
	while ($data = $posts->fetch()) {
	?>    
	    <h3>
	    	<?= htmlspecialchars($data['title'])?>
	    	le <?= $data['creation_date_fr']?>
	    </h3>
	    <p>
	    	<?= nl2br(htmlspecialchars($data['content']))?>
	    	<br />
	    	<a href="index.php?action=post&amp;id=<?= $data['id']?>">Commentaires</a>
	    </p>
	<?php
	}
	
	$posts->closeCursor();
	?>
</div>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>