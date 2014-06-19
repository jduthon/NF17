<h1 class="page-header">Formulaire de réparation</h1>

<form class="form-horizontal" method="post" action="" role="form">	
	
	<div class="form-group">
		<label for="plaque immatriculation" class="col-sm-1 control-label">Immatriculation</label>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="Immatriculation" id="nom_categorie" placeholder="Immatriculation" value = "<?php echo $vehicule->getnumero_immatriculation(); ?>" />
				</div>
				<label for="prix" class="col-sm-1 control-label"> Prix </label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="prix" id="prix" placeholder="Prix"  />
				</div>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		
		<div class="col-sm-10">
			<div class="row">
				<label for="Nombre jours de reparation" class="col-sm-1 control-label">Debut de la reparation</label>
				<div class="input-group date">
								<input type="datetime" class="form-control" name="date_deb_loc" id="date_deb_loc">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
	</div>
	
		
	
	
	<div class="form-group">
		<div class="col-sm-10">
			<div class="row">
				<label for="Nombre jours de reparation" class="col-sm-1 control-label">Fin de la reparation</label>
				<div class="input-group date">
								<input type="datetime" class="form-control" name="date_fin_loc" id="date_fin_loc" >
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="form-group">
				<label for="entreprise" class="col-sm-1 control-label">Entreprise</label>
				<div class="col-sm-4">
					<select type="text" class="form-control" name="entreprise" id="entreprise" placeholder="Entreprise"  />w
						<?php foreach($entreprises as $ent) { ?>
									<option> <?php echo $ent->getnom_entreprise(); ?> </option>
						<?php } ?>
					</select>
				</div>
	</div>
	
	
	<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Ajouter</button>
				</div>
			
	</div>
			
</form>