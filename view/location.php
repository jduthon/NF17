<h1>
	Location <?php echo $location['num_contrat']; ?>
	<br><small>Etat : <?php echo $location['etat']; ?></small>
</h1>

<section class="row">
	<div class="col-md-<?php echo $professionnel == true ? 4 : 6; ?>">
		<h2>Contrat de location</h2>
		
		<form class="form-horizontal" method="post" action="" role="form">
			<div class="form-group">
				<label class="col-sm-5 control-label">N° de contrat</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['num_contrat']; ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Véhicule</label>
				<div class="col-sm-7">
					<p class="form-control-static">
						<?php if ($location['etat'] == 'Passé') { ?>
							<?php echo $location['vehicule']; ?>
						<?php } ?>
						<?php if ($location['etat'] != 'Passé') { ?>
							<select class="form-control" name="vehicule" id="vehicule">
								<?php foreach($vehicules as $vehicule) { ?>
									<option <?php echo ($location['vehicule'] == $vehicule) ? 'selected' : ''; ?>>
										<?php echo $vehicule; ?>
									</option>
								<?php } ?>
							</select>
						<?php } ?>
					</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label" for="date_debut_loc">Date de départ</label>
				<div class="col-sm-7">
					<p class="form-control-static">
						<?php if ($location['etat'] == 'Passé') { ?>
							<?php echo $location['date_debut_loc']; ?>
						<?php } ?>
						<?php if ($location['etat'] != 'Passé') { ?>
							<div class="input-group date">
								<input type="datetime" class="form-control" name="date_debut_loc" id="date_debut_loc" value="<?php echo $location['date_debut_loc']; ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						<?php } ?>
					</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label" for="date_fin_loc">Date de retour</label>
				<div class="col-sm-7">
					<p class="form-control-static">
						<?php if ($location['etat'] == 'Passé') { ?>
							<?php echo $location['date_fin_loc']; ?>
						<?php } ?>
						<?php if ($location['etat'] != 'Passé') { ?>
							<div class="input-group date">
								<input type="datetime" class="form-control" name="date_fin_loc" id="date_fin_loc" value="<?php echo $location['date_fin_loc']; ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
						<?php } ?>
					</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Seuil de kilométrage</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['seuil_km']; ?> km</p>
				</div>
			</div>
			<?php if ($location['etat'] != 'Passé') { ?>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Valider</button>
				</div>
			<?php } ?>
		</form>
	</div>

	<div class="col-md-<?php echo $professionnel == true ? 4 : 6; ?>">
		<h2>Facture</h2>
		
		<form class="form-horizontal" method="post" action="" role="form">
			<div class="form-group">
				<label class="col-sm-5 control-label">Montant</label>
				<div class="col-sm-7">
					<p class="form-control-static">
						<?php echo $location['montant']; ?> €
					</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Kilométrage</label>
				<div class="col-sm-7">
					<p class="form-control-static">
						<?php echo $location['kilometrage']; ?> km
					</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Frais supplémentaires</label>
				<div class="col-sm-7">
					<div class="form-control-static">
						<?php echo $location['frais_supplementaires']; ?> €
						<ul class="list-unstyled">
							<?php if ($location['depassement_km'] > 0) { ?>
								<li>Dépassement : <?php echo $location['depassement_km']; ?> km</li>
							<?php } ?>
							<?php if (!empty($location['reparations'])) { ?>
								<li>Réparations : <?php echo $location['reparations']; ?> €</li>
							<?php } ?>							
							<?php if (!empty($location['penalite'])) { ?>
								<li>Pénalité : <?php echo $location['penalite']; ?> jours</li>
							<?php } ?>							
							<?php if ($location['essence'] > 0) { ?>
								<li>Essence : <?php echo $location['essence']; ?> €</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label" class="moyen_paiement">Moyen de paiement</label>
				<div class="col-sm-7">
					<p class="form-control-static">
						<?php if ($location['etat'] == 'Passé') { ?>
							<?php echo $location['moyen_paiement']; ?>
						<?php } ?>
						<?php if ($location['etat'] != 'Passé') { ?>
						<select class="form-control" name="moyen_paiement" id="moyen_paiement">
							<?php foreach($moyens_paiements as $moyen_paiement) { ?>
								<option <?php echo ($location['moyen_paiement'] == $moyen_paiement) ? 'selected' : ''; ?>>
									<?php echo $moyen_paiement; ?>
								</option>
							<?php } ?>
						</select>	
						<?php } ?>
					</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Date de règlement</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['date_reglement']; ?></p>
				</div>
			</div>
			<?php if ($location['etat'] != 'Passé') { ?>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Valider</button>
				</div>
			<?php } ?>
		</form>
	</div>
	
	<?php if ($professionnel == true) { ?>
	<div class="col-md-4">
		<h2>Conducteurs</h2>
		
		<div class="form-horizontal">
			<?php foreach($location['conducteurs'] as $conducteur) { ?>
				<form class="form-group" method="post" action="" role="form">
					<div class="col-xs-10">
						<dl class="form-control-static dl-horizontal">
							<dt>Nom</dt><dd><?php echo $conducteur['nom']; ?></dd>
							<dt>Prénom</dt><dd><?php echo $conducteur['prenom']; ?></dd>
							<dt>Numéro du permis</dt><dd><?php echo $conducteur['copie_permis']; ?></dd>
						</dl>
					</div>
					<?php if ($location['etat'] != 'Passé') { ?>
						<div class="col-xs-1">
							<button class="btn btn-default btn-xs" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
						</div>
					<?php } ?>
				</form>
			<?php } ?>
		</div>
		
		<?php if ($location['etat'] != 'Passé') { ?>
			<form class="form-horizontal" method="post" action="" role="form">
				<div class="form-group">
					<label class="col-sm-5 control-label" for="conducteur">Ajouter un conducteur</label>
					<div class="col-sm-7">
						<p class="form-control-static">
							<select class="form-control" name="conducteur" id="conducteur">
								<?php foreach($conducteurs as $conducteur) { ?>
									<option><?php echo $conducteur; ?></option>
								<?php } ?>
							</select>
						</p>
					</div>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Ajouter</button>
				</div>
			</form>
		<?php } ?>
	</div>
	<?php } ?>
</section>

<br>

<section class="row">
	<p>
		<a href="locations">Retour aux locations</a>
	</p>
</section>

<br>