<h1>Mes locations</h1>

<div>
	<a href="recherche" class="btn btn-primary" role="button">Réserver une nouvelle location</a>
</div>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="col-xs-1">N° de contrat</th>
				<th class="col-xs-3">Véhicule</th>
				<th class="col-xs-1">Départ</th>
				<th class="col-xs-1">Retour</th>
				<th class="col-xs-1">Montant</th>
				<th class="col-xs-1">Moyen de paiement</th>
				<th class="col-xs-1">État</th>
				<th class="col-xs-3">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($locations))
					foreach($locations as $location) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							<?php echo $location->getnum_contrat(); ?>
						</td>
						<td>
							<img class="col-xs-6" src="<?php echo $_images; ?>/vehicules/<?php echo $location->getVehicule()->getnumero_immatriculation(); ?>.jpg" alt="<?php echo $location->getVehicule()->getnumero_immatriculation(); ?>" /> 
							<?php echo $location->getVehicule()->getmarque(); ?>						
							<?php echo $location->getVehicule()->getModele()->getnom_modele(); ?>						
						</td>
						<td>
							<?php echo $location->getContrat()->getdate_debut_loc(); ?>
						</td>
						<td>
							<?php echo $location->getContrat()->getdate_fin_loc(); ?>
						<td>
							<?php echo $location->getMontantPrevi(); ?> €
						</td>
						<td>
							<?php echo $location->getContrat()->getFacture()->getmoyen_de_paiement(); ?>
						</td>
						<td>
							<?php echo $location->getEtat(); ?>
						</td>
						<td>
							<div class="btn-group">
								<?php if ($location->getEtat() == 'Passé' || $location->getEtat() == "Validé" || $location->getEtat() == "A valider") { ?>
									<a href="location-<?php echo $location->getnum_contrat(); ?>" class="btn btn-primary" role="button">Voir</a>
								<?php } else { ?>
									<a href="location-<?php echo $location->getnum_contrat(); ?>" class="btn btn-primary" role="button">Modifier</a>
								<?php } ?>
								
								<?php if ($location->getEtat() == 'A confirmer') { ?>
									<input type="hidden" name="numero_immatriculation" value="<?php echo $location->getVehicule()->getnumero_immatriculation(); ?>" />
									<button name="annuler" value="annuler" class="btn btn-primary" type="submit">Annuler</button>
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
	