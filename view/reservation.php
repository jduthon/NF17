<h1>Réservation d'un véhicule</h1>

<div class="row">
	<form role="form" method="post" action="reserver" id="reserver">

		<div class="form-group col-sm-4 barre">
			<h3>Date du départ</h3>
			<div>
				<label for="date_debut_loc" class="control-label hidden-lg">Date</label>
				<div class="input-group date">
					<input type="text" class="form-control" name="date_debut_loc" id="date_debut_loc" value="<?php echo $post['date_debut_loc']; ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
		</div>		
		
		<div class="form-group col-sm-4 barre">
			<h3>Date du retour</h3>
			<div>
				<label for="date_fin_loc" class="control-label hidden-lg">Date</label>
				<div class="input-group date">
					<input type="text" class="form-control" name="date_fin_loc" id="date_fin_loc" value="<?php echo $post['date_fin_loc']; ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
		</div>
		
		<div class="form-group col-sm-4 barre">
			<h3>Véhicule réservé</h3>
			<div class="row">	
				<div class="col-xs-4">
					<img class="col-xs-12" src="<?php echo $_images; ?>/vehicules/<?php echo $vehicule->getnumero_immatriculation(); ?>.jpg" alt="<?php echo $vehicule->getnumero_immatriculation(); ?>" /> 
				</div>
				<div class="col-xs-8">
					<?php echo $vehicule->getnom_categorie(); ?>
					<strong><?php echo $vehicule->getmarque(); ?> <?php echo $vehicule->getnom_modele(); ?></strong>
				</div>
			</div>
		</div>
		
		<div class="row text-right">
			<input type="hidden" value="<?php echo $vehicule->getnumero_immatriculation(); ?>" name="numero_immatriculation" />
			<button type="submit" name="reserver" value="reserver" class="btn btn-lg btn-primary">Réserver</button>
		</div>
	</form>
</div>