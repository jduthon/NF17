<h1>Liste des albums</h1>

<div>
	<?php foreach($liste_albums as $album) { ?>
		<ul>
			<li><?php echo $album['titre']; ?> - Publié le <?php echo $album['date']; ?></li>
		</ul>
	<?php } ?>
</div>