<header class="navbar navbar-inverse navbar-static-top" role="banner">
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
		
		<nav class="collapse navbar-collapse" role="navigation">
			<ul class="nav navbar-nav">			
				<?php $utilisateur_connecte = true;
				if(!empty($utilisateur_connecte) && $utilisateur_connecte) { ?> 
					<li><a href="locations">Mes locations</a></li>
					<li><a href="conducteurs">Conducteurs</a></li>
					<li><a href="agents">Agents</a></li>
					<li><a href="entreprises">Entreprises</a></li>
				<?php } ?>				
			</ul>
			
			<a href="connexion" class="btn btn-default navbar-btn visible-xs"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
			
			<div class="pull-right hidden-xs">
				<a href="connexion" class="btn btn-default btn-xs navbar-btn"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
			</div>
		</nav>
	</div>
</header>
