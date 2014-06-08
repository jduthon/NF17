<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
	
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
				<span class="sr-only">Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<a href="./" class="navbar-brand"><span class="glyphicon glyphicon-home"></span></a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="./">Accueil</a></li>
				
				<?php $utilisateur_connecte = true;
				if(!empty($utilisateur_connecte) && $utilisateur_connecte) { ?> 
					<li><a href="">Liste des locations</a></li>
				<?php } ?>				
			</ul>
			
			<a href="connexion" class="btn btn-default navbar-btn visible-xs"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
			
			<div class="pull-right hidden-xs">
				<a href="connexion" class="btn btn-default btn-xs navbar-btn"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
			</div>
		</div>
	</div>
</nav>
