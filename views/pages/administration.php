<?php
/* Si admin connecté */
if (!empty($_SESSION['connecte'])) {
	
	if(!empty($h1))
		echo '<h1>'.$h1.'</h1>';
	
	
	/* Gestion des articles et des partenaires */
	if(!empty($_GET['action'])) { ?>
		
		<!-- Ajout d'un partenaire -->
		<?php if (0) { ?>
		
		
		<!-- Ajout d'un article > Posté !-->
		<?php } elseif($_GET['action'] == 'succes') { ?>
			<p>Article posté ! =)</p>
		
		
		<!-- Ajout d'un article -->
		<?php } elseif($_GET['action'] == 'ajouter_article') { ?>
			
			<!-- Ajout d'un article > Images -->
			<?php if(empty($_POST['etape_images'])) { ?>
				
				<p>
					<strong>Avant de créer l'article, préparer et uploader toutes les images</strong> <br />
					dans le dossier <code>_/images/articles/<?php echo $id; ?>/</code> qui vient d'être créé.<br />
					Images en qualité 8, entrelacées.
				</p>
				
				<p class="annotation">
					<em>Infos FTP</em> : <br />
					ftpperso.free.fr (port 21)<br />
					sand4l - euRT790K
				</p>
				
				<h2>Le bandeau (sous le menu)</h2>
				<p>
					<code>_/images/articles/<?php echo $id; ?>/0.jpg</code> <br />
					<em>Taille</em> : 950px*300px
				</p>
				
				<h2>Toutes les images de l'article</h2>
				<p>
					<code>_/images/articles/<?php echo $id; ?>/i.jpg</code> i&isin;[0,n] <br />
					<em>Taille</em> : 670px*300px
				</p>
					
				<form method="POST" action="administration.php?action=ajouter_article">
					<input type="hidden" name="etape_images" value="1" />
					<input type="submit" value="Image prêtes et uploadées !" />
				</form>
			
			<!-- Ajout d'un article > Création -->
			<?php } else { ?>
				
				<!-- Ajout d'un article > Création > Aperçu -->
				<?php if (!empty($article)) { ?>
					
					<?php include 'vues/pages/article.php'; ?>
					
				<?php }?>
				
				<!-- Ajout d'un article > Création > Formulaire-->
				<form method="POST" action="administration.php?action=ajouter_article" >
					
					<label for="titre">Titre : </label>
						<input type="text" id="titre" name="titre" value="<?php echo (!empty($_POST['titre']) ? $_POST['titre'] : ''); ?>" required autofocus />
						
					<label for="contenu_article">Contenu : </label>
						<textarea id="contenu_article" name="contenu" required ><?php echo (!empty($_POST['contenu']) ? $_POST['contenu'] : $pre_contenu); ?></textarea>
						
					<input type="hidden" name="etape_images" value="1" />
					
					<div class="centre">
						Aperçu de l'article <input type="radio" name="action_validation" value="apercu" checked="checked" /> - Poster l'article <input type="radio" name="action_validation" value="poster" />
						<br />
						<input type="submit" value="Valider" />
					</div>
					
				</form>
			
			<?php } ?>
			
			
		<?php } ?>
		
		
	<!-- Liste des articles et partenaires -->
	<?php } else { ?>
	
		<pre>
			<?php print_r($articles); ?>
		</pre>
	
	<?php } ?>
		
	<p>
		<br />
		<span><a href="administration.php">Liste des articles</a></span> - <span><a href="administration.php?action=ajouter_article">Ajouter un article</a></span> - <span><a href="administration.php?action=deconnexion">Deconnexion</a></span>
	</p>
	
<!-- Connexion -->
<?php } else { ?>

	<h1>Connexion</h1>

	<form method="POST" class="connexion">
		
		<label for="utilisateur">Utilisateur : </label>
			<input type="text" id="utilisateur" name="utilisateur" value="<?php echo (!empty($_POST['utilisateur']) ? $_POST['utilisateur'] : ''); ?>" required autofocus /><br /><br />

		<label for="mot_de_passe">Mot de passe : </label>
			<input type="password" id="mot_de_passe" name="mot_de_passe" required /><br /><br />
		
		<div class="centre">
			<input type="submit" value="Connexion" />
		</div>
	</form>
	
<?php } ?>
