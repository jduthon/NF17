<section>

	<?php echo $var; ?>
	
	<img src="<?php echo $_images . '/favicon.png'; ?>" alt="image" />

	<div>Voici le résultat d'une requête transmis à la vue</div>
	<pre>
		<?php print_r($album); ?>
	</pre>
	
	<div>
		Voici un lien vers une autre vue : 
		<a href="albums">liste des albums</a>
	</div>
	
</section>

<section class="row">
	<?php include 'recherche.php'; ?>
</section>

<section class="row">
	<?php include 'liste_vehicules.php'; ?>
</section>
