<h1 class="page-header">Ajout de voiture </h1>

<form class="form-horizontal" method="post" action="" role="form">	
	
	<div class="form-group">
		<label for="categorie" class="col-sm-1 control-label">Catégorie</label>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-4">
								<select class="form-control" name="nom_categorie" id="categorie" required>
									<?php foreach($categories as $cat) { ?>
										<option><?php echo $cat->getnom_categorie() ;?></option>
									<?php } ?>
								</select>	
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
				<input type="text" class="form-control" name="numero_immatriculation" id="numero_immatriculation" placeholder="Immatriculation"  <?php if ($typemodif == 'modification'){echo 'disabled';}?> value = "<?php if ($typemodif == 'modification') {echo $vehicule->getnumero_immatriculation();}?>" /> 
			</div>
			<label for="model" class="col-sm-1 control-label">Modele</label>
			<div class="col-sm-5">
				<select class="form-control" name="nom_modele" id="model" required>
									<?php foreach($modeles as $mod) { ?>
										<option><?php echo $mod->getnom_modele() ;?></option>
									<?php } ?>
				</select>	
			</div>
			
		</div>
	</div>
		
	<div class="form-group">
		<label for="telephone" class="col-sm-1 control-label">Kilométrage</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" name="km" id="kilometrage" placeholder="Kilometrage" value = "<?php if ($typemodif == 'modification'){echo $vehicule->getkm();}?>" />
			</div>

			<label for="niveau_carb" class="col-sm-1 control-label">Niveau de carburant </label>
			<div class="col-sm-5">
				<input type="number" class="form-control" name="niveau_carb" id="niveau_carb" placeholder="Niveau de carburant" value = "<?php if ($typemodif == 'modification'){echo $vehicule->getniveau_carb();}?>">
			</div>
	</div>
	<div class="form-group">
		<label for="couleur" class="col-sm-1 control-label">Couleur</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="couleur" id="couleur" placeholder="Couleur" value = "<?php if ($typemodif == 'modification'){ echo $vehicule->getcouleur();}?>">
		</div>
		<label for="degats" class="col-sm-1 control-label">Dégats</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="degats_eventuels" id="degats" placeholder="Degats" value = "<?php if ($typemodif == 'modification'){echo $vehicule->getdegats_eventuels();}?>">
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