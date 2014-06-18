<form class="form-horizontal" method="post" action="" role="form">
	<h2 class="page-header">Modification ou ajout de voiture </h2>
	
	
	<div class="form-group">
		<label for="categorie" class="col-sm-1 control-label">Catégorie</label>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="categorie" id="nom_categorie" placeholder="Categorie" value="<?php if ($typemodif == 'modification') {echo $vehicule->getnom_categorie(); }?> " />
				</div>
				<label for="marque" class="col-sm-1 control-label">Marque</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="marque" id="marque" placeholder="Marque" value = "<?php if ($typemodif == 'modification'){echo $vehicule->getmarque(); }?>" />
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="immatriculation" class="col-sm-1 control-label">Immatriculation</label>
		<div class="col-sm-10">
			<div class="col-sm-5">
				<input type="text" class="form-control" name="immatriculation" id="numero_immatriculation" placeholder="Immatriculation"  <?php if ($typemodif == 'modification'){echo 'disabled';}?> value = "<?php if ($typemodif == 'modification') {echo $vehicule->getnumero_immatriculation();}?>" /> 
			</div>
			<label for="model" class="col-sm-1 control-label">Modele</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="modele" id="nom_modele" placeholder="Modele" value= "<?php if ($typemodif == 'modification'){echo $vehicule->getnom_modele();}?>"/> 
			</div>
			
		</div>
	</div>
	
	<div class="form-group">
		<label for="est loué" class="col-sm-1 control-label">Est loué</label>
			<div class="col-sm-5">
				<input type="boolean" class="form-control" name="etat" id="etat" placeholder="Etat">
			</div>
	</div>
	
	
	<div class="form-group">
		<span class="col-sm-1 control-label">Date de mise en circulation</span>
			<div class="row">
				<label for="jour_mise_en_cirsulation" class="col-sm-1 control-label">Jour</label>
				<div class="col-sm-1 col-md-1">
					<input type="number" class="form-control" name="jour_mise_en_cirsulation" id="jour_mise_en_cirsulation" min="01" max="31" step="1">
				</div>
				
				<label for="mois_mise_en_cirsulation" class="col-sm-1 col-md-offset-1 control-label">Mois</label>
				<div class="col-sm-1 col-md-1">
					<input type="number" class="form-control" name="mois_mise_en_cirsulation" id="mois_mise_en_cirsulation" min="01" max="12" step="1">
				</div>
				
				<label for="annee_mise_en_circulation" class="col-sm-1 col-md-offset-1 control-label">Année</label>
				<div class="col-sm-1 col-md-1">
					<input type="number" class="form-control" name="annee_mise_en_circulation" id="annee_mise_en_circulation" min="1920" max="2010" step="1">
				</div>
			</div>
	</div>

		
		<div class="form-group">
			<label for="telephone" class="col-sm-1 control-label">Kilométrage</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" name="kilometrage" id="kilometrage" placeholder="Kilometrage" value = "<?php if ($typemodif == 'modification'){echo $vehicule->getkm();}?>" />
				</div>

				<label for="niveau_carburant" class="col-sm-1 control-label">Niveau de carburant </label>
				<div class="col-sm-5">
					<input type="number" class="form-control" name="niveau_carburant" id="niveau_carburant" placeholder="Niveau de carburant" value = "<?php if ($typemodif == 'modification'){echo $vehicule->getniveau_carb();}?>">
				</div>
		</div>
		<div class="form-group">
			<label for="couleur" class="col-sm-1 control-label">Couleur</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="couleur" id="couleur" placeholder="Couleur" value = "<?php if ($typemodif == 'modification'){ echo $vehicule->getcouleur();}?>">
			</div>
			<label for="degats" class="col-sm-1 control-label">Dégats</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="degats" id="degats" placeholder="Degats" value = "<?php if ($typemodif == 'modification'){echo $vehicule->getdegats_eventuels();}?>">
			</div>
			
		</div>

		<div class="form-group">
			<select class="form-control" name="option" id="option">
							<?php foreach($options as $opt) { ?>
								<option><?php echo $opt ;?></option>
							<?php } ?>
			</select>	
		</div>
	
		
		

	

  
	<div class="form-group text-left">
		<button type="submit" class="btn btn-primary">Valider</button>
	</div>
	
</form>