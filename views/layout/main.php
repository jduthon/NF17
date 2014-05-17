<!doctype html>

<html>

	<?php
		include 'vues/structure/en_tete.php';
	?>

	<body>
		<header>
			<!-- Menu -->
			<?php
				include 'vues/structure/menu.php';
			?>
			

		</header>
					<!-- Bandeau -->
			<div id="bandeau">
				<img src="<?php echo $bandeau; ?>" alt="<?php echo $page; ?>" title="" />
			</div>
		<!-- Corps -->
		<div id="corps">
			<?php if($page != 'article') { //Les pages du site autre que les articles ?>
			
				<section id="contenu" class="page">
					<article>
						<div class="contenu">
							<?php
								include 'vues/pages/' . $page . '.php';
							?>
						</div>
					</article>
				</section>
				
			<?php } else { ?>
			
				<section id="contenu">
					<?php
					if(!empty($article)) { //Affichage d'un article
					
						include 'vues/pages/article.php';
						
					} else { //Affichage des derniers articles
					
						if(!empty($articles)) {
							foreach($articles as $article) {
							
								include 'vues/pages/article.php';
								echo '<hr>';
							}
						}
					} ?>
				
				</section>
				
			<?php } ?>
			
			<?php
				include 'vues/structure/lateral.php';
			?>
		</div>
		<?php
			include 'vues/structure/pied_de_page.php';
		?>
	</body>
</html>
