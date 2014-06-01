<h1>Liste des albums</h1>

<div>
	<?php foreach($liste_albums as $album) { ?>
		<ul>
			<li>
				<a href="/album-<?php echo $album['id']; ?>"><?php echo $album['titre']; ?></a> - Publié le <?php echo $album['date']; ?>
			</li>
		</ul>
	<?php } ?>
</div>