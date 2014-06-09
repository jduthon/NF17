<h1 class="text-center">Connexion</h1>

<section class="row">
	<div class="col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">

		<form role="form" method="post" action="" id="connexion">
			
			<label for="adresse_email" class="sr-only">Adresse email</label>
			<input type="email" class="form-control input-lg" id="adresse_email" name="adresse_email" placeholder="Adresse email" required autofocus>

			<label for="mot_de_passe" class="sr-only">Mot de passe</label>			
			<input type="password" class="form-control input-lg" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required>
			
			<label class="checkbox">
				<input type="checkbox" id="se_souvenir" name="se_souvenir" value="no"> Se souvenir de moi
			</label>
			
			<button type="submit" class="btn btn-lg btn-primary btn-block">Connexion</button>
		</form>
		
		<br>
		
		<?php if (!empty($connexion_client) AND $connexion_client == true) { ?>
			<p class="text-center">
				Vous êtes un nouveau client ? <a href="inscription">Inscrivez-vous</a>
			<p>
		<?php } ?>

	</div>
</section>