<nav class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a href="./" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Tomme Framework</a>
		</div>
	
		<ul class="nav navbar-nav">
			<li class="active"><a href="./">Accueil</a></li>
			<li><a href="#">Contact</a></li>
			
			<?php $utilisateur_connecte = true;
			if(!empty($utilisateur_connecte) && $utilisateur_connecte) { ?> 
				<li><a href="">Liste des locations</a></li>
			<?php } ?>
		</ul>
		
		<div class="pull-right">
			<a href="connexion" class="btn btn-default btn-xs navbar-btn"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
		</div>
	</div>
</nav>
