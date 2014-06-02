<header class="page-header">
	<h1>Liste des albums</h1>
</header>

<div>
	<?php foreach($liste_albums as $album) { ?>
		<ul class="list-group">
			<li class="list-group-item">
				<a href="/album-<?php echo $album['id']; ?>"><?php echo $album['titre']; ?></a> - Publié le <?php echo $album['date']; ?>
			</li>
		</ul>
	<?php } ?>
</div>
