<h1>
	Véhicules à contrôler <br>
	<small>véhicules revenant de location nécessitant un contrôle avant leur remise en ligne</small>
</h1>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="col-xs-1">Modèle</th>
				<th class="col-xs-1">Dates de location</th>	
				<th class="col-xs-1">Niveau de carburant au retour</th>	
				<th class="col-xs-2">Km au retour</th>	
				<th class="col-xs-3">Dégâts éventuels</th>	
				<th class="col-xs-1">Montant calculé</th>
				<th class="col-xs-3">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($locations as $location) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							<?php echo $location->getVehicule()->getmarque(); ?> <?php echo $location->getVehicule()->getnom_modele(); ?>
						</td>
						<td>
							<?php echo $location->getContrat()->getdate_debut_loc(); ?> <?php echo $location->getContrat()->getdate_fin_loc(); ?>
						</td>
						<td>
							<input type="number" class="form-control" name="niveau_carb" id="niveau_carb" min="00" max="1000" step="0.1" value="<?php echo $post['niveau_carb']; ?>" required>
						</td>
						<td>
							<input type="number" class="form-control" name="km" id="km" min="00" max="1000000" step="0.1" value="<?php echo $post['km']; ?>" required>
						</td>
						<td>
							<textarea name="degats_eventuels" class="form-control"><?php echo $post['degats_eventuels']; ?></textarea>
						</td>
						<td>
							<?php echo $location->getContrat()->getFacture()->getmontant(); ?> €
						</td>
						<td>
							<input type="hidden" name="id_location" value="<?php echo $location->getid_location(); ?>" />
							<div class="btn-group">
								<button name="calculer" class="btn btn-primary" type="submit">Modifier</button>
								<button name="valider" class="btn btn-primary" type="submit">Valider le montant</button>
							</div>
						</td>
					</form>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</section>
