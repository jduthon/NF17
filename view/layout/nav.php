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
						<?php } ?>
					<?php if($_SESSION['agent']->isTechnique()){ ?>
						<li><a href="controle-locations">Véhicules à contrôler</a></li>
						<li><a href="gestion-vehicules">Gestion du parc</a></li>
					<?php } ?>
				<?php } ?>
			</ul>
			
			<ul class="nav navbar-nav pull-right">
			<?php if(isset($_SESSION['user'])) { ?> 
				<li><a href="compte"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
				<li><a href="deconnexion"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
			<?php } else if(isset($_SESSION['agent'])){ ?>
				<li><a href="deconnexionEmploye"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
			<?php } else if(isset($_SESSION['admin'])){ ?>
				<li><a href="deconnexionAdmin"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
			<?php } else { ?>
				<li><a href="connexion"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
			<?php } ?>
			</ul>
		</nav>
	</div>
</header>
