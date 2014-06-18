<tr>
	<td>
		<img class="col-xs-12" src="<?php echo $_images; ?>/vehicules/<?php echo $vehicule->getnumero_immatriculation(); ?>.jpg" alt="<?php echo $vehicule->getnumero_immatriculation(); ?>" /> 
	</td>
	<td>
		<?php echo $vehicule->getnom_categorie(); ?>
	</td>
	<td>
		<strong><?php echo $vehicule->getmarque(); ?> <?php echo $vehicule->getnom_modele(); ?></strong>
	</td>
	<td>
		<ul class="no-padding">
			<li><?php echo $vehicule->getmodele()->getnb_portes(); ?> portes</li>
			<li>Boîte <?php echo $vehicule->getmodele()->getboite_vitesse(); ?></li>
			<li>Taille : <?php echo $vehicule->getmodele()->gettaille(); ?> m</li>
			<li>Puissance fiscale : <?php echo $vehicule->getmodele()->getpuissance_fiscale(); ?> ch</li>
			<li>Couleur : <?php echo $vehicule->getcouleur(); ?></li>
		</ul>
	</td>
	<td>
		<ul class="list-unstyled">
			<?php foreach($vehicule->getoptions() as $option) { ?>
				<li>
					<input type="checkbox" id="<?php echo $vehicule->getnumero_immatriculation(); ?>_options" value="<?php echo $option; ?>"> <?php echo $option; ?>
				</li>
			<?php } ?>
		</ul>
	</td>
	<td>
		<strong><?php echo $vehicule->getprix(); ?> €</strong> <br>
		<small><?php echo $vehicule->getseuil_km(); ?> km inclus gratuits</small>
	</td>
	<td>
		<form role="form" method="post" action="">
			<?php if(empty($statut)) { ?>
			<button type="submit" name="reserver" value="<?php echo 'Reserver'; ?>" class="btn btn-primary">Réserver</button>
			<?php } ?>	
			<?php if(!empty($statut)) { ?>
				<button type="submit" name="entretien" value="<?php echo 'entretien'; ?>" class="btn btn-primary">Entretien</button>
			<?php } ?>
			<?php if(!empty($statut)) { ?>
				<button type="submit" name="réparation" value="<?php echo 'reparation'; ?>" class="btn btn-primary">Réparation</button>
			<?php } ?>
			<?php if(!empty($statut)) { ?>
				<button type="submit" name="supprimer" value="<?php echo 'supprimer'; ?>" class="btn btn-primary">Supprimer</button>
			<?php } ?>
		</form>
	</td>
</tr>