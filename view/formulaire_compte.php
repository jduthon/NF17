<?php include("successlist.php"); ?>
<form class="form-horizontal" method="post" action="" role="form">
	<h2 class="page-header">Informations personnelles</h2>
	
	<?php if ($client->isParticulier()) { ?>
		<div class="form-group">
			<label for="nom" class="col-sm-2 control-label">Nom</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $client->getParticulier()->getnom(); ?></p>
				<input type="hidden" name="nom" value="<?php echo $client->getParticulier()->getnom(); ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="prenom" class="col-sm-2 control-label">Prénom</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $client->getParticulier()->getprenom(); ?></p>
				<input type="hidden" name="prenom"disabled value="<?php echo $client->getParticulier()->getprenom(); ?>">
			</div>
		</div>
	<?php } ?>
	
	<?php if ($client->isProfessionnel()) { ?>
		<div class="form-group">
			<label for="nom_entreprise" class="col-sm-2 control-label">Nom de l'entreprise</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $client->getProfessionnel()->getnom_entreprise(); ?></p>
				<input type="hidden" name="nom_entreprise" value="<?php echo $client->getProfessionnel()->getnom_entreprise(); ?>">
			</div>
		</div>
	<?php } ?>
	

	
	<?php if ($client->isParticulier()) { ?>
		<div class="form-group">
			<label for="adresse" class="col-sm-2 control-label">Adresse</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" value="<?php echo $client->getParticulier()->getadresse(); ?>" required>
					</div>

					<label for="ville" class="col-sm-1 control-label">Ville</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="ville" id="ville" placeholder="Ville" value="<?php echo $client->getParticulier()->getville(); ?>" required>
					</div>
				</div>
			</div>
		</div> 
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Date de naissance</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $client->getParticulier()->getdate_naissance(); ?></p>
			</div>
		</div>
		
		<div class="form-group">
			<label for="telephone" class="col-sm-2 control-label">Téléphone</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-4">
						<input type="text" class="form-control" name="numero_tel" id="numero_tel" placeholder="Téléphone" value="<?php echo $client->getParticulier()->getnumero_tel(); ?>" required>
					</div>

					<label for="permis" class="col-sm-3 control-label">Numéro de Permis</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="copie_permis" id="copie_permis" placeholder="Numéro de Permis" value="<?php echo $client->getParticulier()->getcopie_permis(); ?>" required>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	
	<?php if (!empty($inscription) && $inscription == true) { ?>
		<h2 class="page-header">Informations d'adhésion</h2>
		
		<div class="form-group">
			<label for="identifiant" class="col-sm-2 control-label">Identifiant</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-5">
						<input type="text" class="form-control" name="identifiant" id="identifiant" placeholder="Identifiant" required>
					</div>

					<label for="mot_de_passe" class="col-sm-3 control-label">Mot de passe</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
  
	<div class="form-group text-right">
		<button type="submit" class="btn btn-primary">Valider</button>
	</div>
	
</form>