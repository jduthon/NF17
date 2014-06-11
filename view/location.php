<h1>
	Location <?php echo $location['num_contrat']; ?>
	<br><small>Etat : <?php echo $location['etat']; ?></small>
</h1>

<section class="row">
	<div class="col-md-<?php echo $professionnel == true ? 4 : 6; ?>">
		<h2>Contrat de location</h2>
		
		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-5 control-label">N° de contrat</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['num_contrat']; ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Véhicule</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['vehicule']; ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Date de départ</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['date_debut_loc']; ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Date de retour</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['date_fin_loc']; ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Seuil de kilométrage</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['seuil_km']; ?> km</p>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-<?php echo $professionnel == true ? 4 : 6; ?>">
		<h2>Facture</h2>
		
		<div class="form-horizontal">
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
				<label class="col-sm-5 control-label">Moyen de paiement</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['moyen_paiement']; ?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Date de règlement</label>
				<div class="col-sm-7">
					<p class="form-control-static"><?php echo $location['date_reglement']; ?></p>
				</div>
			</div>
		</div>
	</div>
	
	<?php if ($professionnel == true) { ?>
	<div class="col-md-4">
		<h2>Conducteurs</h2>
		
		<div class="form-horizontal">
			<?php foreach($location['conducteurs'] as $conducteur) { ?>
				<div class="form-group">
					<label class="col-sm-2 control-label text-right"></label>
					<div class="col-sm-10">
						<dl class="form-control-static dl-horizontal">
							<dt>Nom</dt><dd><?php echo $conducteur['nom']; ?></dd>
							<dt>Prénom</dt><dd><?php echo $conducteur['prenom']; ?></dd>
							<dt>Numéro du permis</dt><dd><?php echo $conducteur['copie_permis']; ?></dd>
						</dl>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
</section>

<p>
	<a href="locations" class="btn btn-primary">Retour aux locations</a>
</p>
	