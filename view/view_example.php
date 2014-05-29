<section>

	<?php echo $var; ?>
	
	<img src="<?php echo $_image_ . '/favicon.png'; ?>" alt="image" />

	<div>Voici le résultat d'une requête transmis à la vue</div>
	<pre>
		<?php print_r($album); ?>
	</pre>
	
	<div>
		Voici un lien vers une autre vue : 
		<a href="?page=anothercontroller&action=myaction">liste des albums</a>
	</div>
</section>

