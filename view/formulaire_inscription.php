<form class="form-horizontal" method="post" action="" role="form">
	<h2 class="page-header">Informations personnelles</h2>
	
	<?php if ($type_client=='particulier') { ?>
		<div class="form-group">
			<label for="nom" class="col-sm-2 control-label">Nom</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" >
			</div>
		</div>
		
		<div class="form-group">
			<label for="prenom" class="col-sm-2 control-label">Prénom</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
			</div>
		</div>
	<?php } ?>
	
	<?php if ($type_client=='professionnel') { ?>
		<div class="form-group">
			<label for="nom_entreprise" class="col-sm-2 control-label">Nom de l'entreprise</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nom_entreprise" id="nom_entreprise" placeholder="Nom de l'entreprise">
			</div>
		</div>
	<?php } ?>
	

	
	<?php if ($type_client=='particulier') { ?>
		<div class="form-group">
		<label for="adresse" class="col-sm-2 control-label">Adresse</label>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-6">
					<input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" >
				</div>

				<label for="ville" class="col-sm-1 control-label">Ville</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="ville" id="ville" placeholder="Ville">
				</div>
			</div>
		</div>
	</div> 
		<div class="form-group">
			<span class="col-sm-2 control-label">Date de naissance</span>
			<div class="col-sm-10">
				<div class="row">
					<label for="jour_naissance" class="col-sm-1 control-label">Jour</label>
					<div class="col-sm-3 col-md-2">
						<input type="number" class="form-control" name="jour_naissance" id="jour_naissance" min="01" max="31" step="1" >
					</div>
					
					<label for="mois_naissance" class="col-sm-1 col-md-offset-1 control-label">Mois</label>
					<div class="col-sm-3 col-md-2">
						<input type="number" class="form-control" name="mois_naissance" id="mois_naissance" min="01" max="12" step="1" >
					</div>
					
					<label for="annee_naissance" class="col-sm-1 col-md-offset-1 control-label">Année</label>
					<div class="col-sm-3">
						<input type="number" class="form-control" name="annee_naissance" id="annee_naissance" min="1920" max="2010" step="1" >
					</div>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label for="numero_tel" class="col-sm-2 control-label">Téléphone</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-4">
						<input type="text" class="form-control" name="numero_tel" id="numero_tel" placeholder="Téléphone" >
					</div>

					<label for="permis" class="col-sm-3 control-label">Numéro de Permis</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="copie_permis" id="copie_permis" placeholder="Numéro de Permis" >
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
						<input type="text" class="form-control" name="id_client" id="identifiant" placeholder="Identifiant" required>
					</div>

					<label for="mot_de_passe" class="col-sm-3 control-label">Mot de passe</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" name="password_gestion_compte" id="mot_de_passe" placeholder="Mot de passe" required>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
  
	<div class="form-group text-right">
		<button type="submit" class="btn btn-primary">Valider</button>
	</div>
	
</form>