<h1>
	Véhicules à contrôler <br>
	<small>véhicules revenant de location nécessitant un contrôle avant leur remise en ligne</small>
</h1>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Modèle</th>
				<th>Dates de location</th>	
				<th>Niveau de carburant au retour</th>	
				<th>Km au retour</th>	
				<th>Dégâts éventuels</th>	
				<th>Montant calculé</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($locations as $location) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							Modèle véhicules
						</td>
						<td>
							date début - date fin
						</td>
						<td>
							<input type="number" class="form-control" name="niveau_carb" id="niveau_carb" min="00" max="1000" step="0.1" value="<?php echo $location['niveau_carb']; ?>" required>
						</td>
						<td>
							<input type="number" class="form-control" name="km" id="km" min="00" max="1000000" step="0.1" value="<?php echo $location['km']; ?>" required>
						</td>
						<td>
							<textarea name="degats_eventuels"><?php echo $location['degats_eventuels']; ?></textarea>
						</td>
						<td>
							<?php echo $montant; ?>
						</td>
						<td class="col-xs-4 text-right">
							<div class="btn-group">
								<input type="hidden" name="id_location" value="<?php echo $location->getid_location(); ?>" />
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
