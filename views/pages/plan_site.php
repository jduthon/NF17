<h1>Plan du site sand4l.free.fr</h1>

<h2>Pages</h2>
<p>
	<ul>
		<li><a href="students_challenge">Le raid</a></li>
		<li><a href="sand4l">L'équipage</a></li>
		<li><a href="partenaires">Nos partenaires</a></li>
		<li><a href="documents">Documents</a></li>
		<li><a href="contact">Contactez-nous</a></li>
		<li><a href="plan_site">Plan du site</a></li>
		<li><a href="mentions_legales">Mentions Légales</a></li>
	</ul>
</p>


<h2>Articles</h2>
<p>
	<ul>
		<?php 
			foreach(liste_articles() as $article) { ?>
				
				<li><a href="?article=<?php echo $article['id']; ?>"><?php echo $article['titre']; ?></a>, le <?php echo $article['date']; ?></li>
			
		<?php }	?>
	</ul>
</p>