<h1>Mes locations</h1>

<div>
	<a href="./recherche" class="btn btn-primary" role="button">Réserver une nouvelle location</a>
</div>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="col-xs-1	">N° de contrat</th>
				<th class="col-xs-2">Voiture</th>
				<th class="col-xs-2">Départ</th>
				<th class="col-xs-2">Retour</th>
				<th class="col-xs-1">Montant</th>
				<th class="col-xs-1">Moyen de paiement</th>
				<th class="col-xs-1">État</th>
				<th class="col-xs-2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($locations as $location) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							<?php echo $location['num_contrat']; ?>
						</td>
						<td>
							<select class="form-control" name="vehicule" id="vehicule">
								<?php foreach($vehicules as $vehicule) { ?>
									<option <?php echo ($location['vehicule'] == $vehicule) ? 'selected' : ''; ?>>
										<?php echo $vehicule; ?>
									</option>
								<?php } ?>
							</select>							
						</td>
						<td>
							<div class="input-group date">
								<input type="datetime" class="form-control" name="date_debut_loc" id="date_debut_loc" value="<?php echo $location['date_debut_loc']; ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						</td>
						<td>
							<div class="input-group date">
								<input type="datetime" class="form-control" name="date_fin_loc" id="date_fin_loc" value="<?php echo $location['date_fin_loc']; ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						<td>
							<?php echo $location['montant']; ?> €
						</td>
						<td>
							<select class="form-control" name="vehicule" id="vehicule">
								<?php foreach($moyens_paiements as $moyen_paiement) { ?>
									<option <?php echo ($location['moyen_paiement'] == $moyen_paiement) ? 'selected' : ''; ?>>
										<?php echo $moyen_paiement; ?>
									</option>
								<?php } ?>
							</select>							
						</td>
						<td>
							<?php echo $location['etat']; ?>
						</td>
						<td>
							<div class="btn-group">
								<a href="location-<?php echo $location['num_contrat']; ?>" class="btn btn-primary" role="button">Voir</a>

								<?php if ($location['etat'] != 'Validé') { ?>
									<button name="modifier" class="btn btn-primary" type="submit">Modifier</button>
									<button name="annuler" class="btn btn-primary" type="submit">Annuler</button>
									<button name="valider" class="btn btn-primary" type="submit">Valider</button>
								<?php } ?>
							</div>
						</td>
					</form>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</section>
	