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
				<?php if(isset($_SESSION['user'])) { ?> 
					<li><a href="locations">Mes locations</a></li>
					<?php if($_SESSION['user']->isProfessionnel()){ ?>
						<li><a href="conducteurs">Conducteurs</a></li>
					<?php } ?>
				<?php } ?>
				<?php if(isset($_SESSION['admin'])) { ?>
					<li><a href="agents">Agents</a></li>
					<li><a href="entreprises">Entreprises</a></li>
					<li><a href="statistiques">Statistiques</a></li>
				<?php } ?>
				<?php if(isset($_SESSION['agent'])) { ?>
					<?php if($_SESSION['agent']->isCommercial()){ ?>
						<li><a href="locations-commercial">Locations</a></li>
						<li><a href="locations-commercial">Véhicules</a></li>
					<?php } ?>
					<?php if($_SESSION['agent']->isTechnique()){ ?>
						<li><a href="vehicules">Véhicules</a></li>
					<?php } ?>
				<?php } ?>
			</ul>
			<?php if(isset($_SESSION['user'])) { ?> 
				<a href="deconnexion" class="btn btn-default navbar-btn visible-xs"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
				
				<div class="pull-right hidden-xs">
					<a href="deconnexion" class="btn btn-default btn-xs navbar-btn"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
				</div>
			<?php } else if(isset($_SESSION['admin'])){ ?>
				<a href="deconnexionAdmin" class="btn btn-default navbar-btn visible-xs"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
				
				<div class="pull-right hidden-xs">
					<a href="deconnexionAdmin" class="btn btn-default btn-xs navbar-btn"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
				</div>
			<?php } else { ?>
				<a href="connexion" class="btn btn-default navbar-btn visible-xs"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
				
				<div class="pull-right hidden-xs">
					<a href="connexion" class="btn btn-default btn-xs navbar-btn"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
				</div>
			<?php } ?>
		</nav>
	</div>
</header>
