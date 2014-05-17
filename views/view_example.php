<article>

	<header class="images">
		<a href="<?php echo $article['lien']; ?>">
			<img class="principale" src="<?php echo $article['dossier_images']; ?>0.jpg" alt="image" title="" />
			
			<?php foreach($article['images'] as $image) { ?>
			
				<div class="secondaires">
					<div class="carre">
						<img src="<?php echo $article['dossier_images'] . $image; ?>" alt="image" title="">
					</div>
				</div>
			<?php } ?>
			
			<div class="date">
			<time datetime="<?php echo date('Y-m-d', $article['timestamp']); ?>" pubdate="pubdate">
				<?php echo date('d/m', $article['timestamp']); ?><br />
				<span class="annee"><?php echo date('Y', $article['timestamp']); ?></span>
			</time>
			</div>
		</a>
	</header>
	
	<div class="contenu">
		<h1>
			<a href="<?php echo $article['lien']; ?>">
				<?php echo $article['titre']; ?>
			</a>
		</h1>
		
		<?php echo $article['contenu']; ?>
	</div>
	
</article>