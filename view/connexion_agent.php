<?php include("errList.php"); ?>

<h1 class="text-center">Connexion agent</h1>

<section class="row">
	<div class="col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">

		<form role="form" method="post" action="" id="connexion">
			
			<label for="identifiant" class="sr-only">Identifiant</label>
			<input type="text" class="form-control input-lg" id="identifiant" name="id_employe" placeholder="Identifiant" required autofocus>

			<label for="password" class="sr-only">Mot de passe</label>			
			<input type="password" class="form-control input-lg" id="password" name="password" placeholder="Mot de passe" required>
			
			<br>
			
			<button type="submit" class="btn btn-lg btn-primary btn-block">Connexion</button>
		</form>
		
		<br>
	</div>
</section>