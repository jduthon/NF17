<?php include("errList.php"); ?>

<h1 class="text-center">Connexion</h1>

<section class="row">
	<div class="col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">

		<form role="form" method="post" action="" id="connexion">
			
			<label for="identifiant" class="sr-only">Identifiant</label>
			<input type="text" class="form-control input-lg" id="identifiant" name="identifiant" placeholder="Identifiant" required autofocus>

			<label for="password" class="sr-only">Mot de passe</label>			
			<input type="password" class="form-control input-lg" id="password" name="password" placeholder="Mot de passe" required>
			
			<br>
			
			<button type="submit" class="btn btn-lg btn-primary btn-block">Connexion</button>
		</form>
		
		<br>
		
		<?php if (!empty($connexion_client) AND $connexion_client == true) { ?>
			<p class="text-center">
				Vous êtes un nouveau client ? Inscrivez-vous en tant que <a href="inscription">particulier</a> ou <a href="inscriptionPro">professionel</a>.
			<p>
		<?php } ?>

	</div>
</section>