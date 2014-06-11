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
		<ul>
			<li><?php echo $vehicule->getmodele()->getnb_portes(); ?> portes</li>
			<li>Boîte <?php echo $vehicule->getmodele()->getboite_vitesse(); ?></li>
			<li>Taille : <?php echo $vehicule->getmodele()->gettaille(); ?></li>
			<li>Puissance fiscale : <?php echo $vehicule->getmodele()->getpuissance_fiscale(); ?></li>
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
			<button type="submit" name="reserver" value="<?php echo $vehicule->getnumero_immatriculation(); ?>" class="btn btn-primary">Réserver</button>
		</form>
	</td>
</tr>