<h1>Mes locations</h1>

<div>
	<a href="recherche" class="btn btn-primary" role="button">Réserver une nouvelle location</a>
</div>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="col-xs-2">N° de contrat</th>
				<th class="col-xs-2">Voiture</th>
				<th class="col-xs-1">Départ</th>
				<th class="col-xs-1">Retour</th>
				<th class="col-xs-1">Montant</th>
				<th class="col-xs-1">Moyen de paiement</th>
				<th class="col-xs-1">État</th>
				<th class="col-xs-3">Actions</th>
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
							<?php echo $location['vehicule']; ?>						
						</td>
						<td>
							<?php echo $location['date_debut_loc']; ?>
						</td>
						<td>
							<?php echo $location['date_fin_loc']; ?>
						<td>
							<?php echo $location['montant']; ?> €
						</td>
						<td>
							<?php echo $location['moyen_paiement']; ?>
						</td>
						<td>
							<?php echo $location['etat']; ?>
						</td>
						<td>
							<div class="btn-group">
								<?php if ($location['etat'] == 'Passé') { ?>
									<a href="location-<?php echo $location['num_contrat']; ?>" class="btn btn-primary" role="button">Voir</a>
								<?php } ?>
								
								<?php if ($location['etat'] != 'Passé') { ?>
									<a href="location-<?php echo $location['num_contrat']; ?>" class="btn btn-primary" role="button">Modifier</a>
								<?php } ?>
								
								<?php if ($location['etat'] == 'A valider') { ?>
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
	