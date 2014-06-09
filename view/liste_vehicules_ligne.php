<tr>
	<td>
		<img class="col-xs-12" src="<?php echo $_images; ?>/vehicules/<?php echo $vehicule['numero_immatriculation']; ?>.jpg" alt="<?php echo $vehicule['numero_immatriculation']; ?>" /> 
	</td>
	<td>
		<?php echo $vehicule['nom_categorie']; ?>
	</td>
	<td>
		<strong><?php echo $vehicule['marque']; ?> <?php echo $vehicule['nom_modele']; ?></strong>
	</td>
	<td>
		<ul>
			<li><?php echo $vehicule['nb_portes']; ?> portes</li>
			<li>Boîte <?php echo $vehicule['boite_vitesse']; ?></li>
			<li>Taille : <?php echo $vehicule['taille']; ?></li>
			<li>Puissance fiscale : <?php echo $vehicule['puissance_fiscale']; ?></li>
		</ul>
	</td>
	<td>
		<ul class="list-unstyled">
			<?php foreach($vehicule['options'] as $option) { ?>
				<li>
					<input type="checkbox" id="<?php echo $vehicule['numero_immatriculation']; ?>_options" value="<?php echo $option; ?>"> <?php echo $option; ?>
				</li>
			<?php } ?>
		</ul>
	</td>
	<td>
		<strong><?php echo $vehicule['prix']; ?> €</strong> <br>
		<small><?php echo $vehicule['seuil_km']; ?> km inclus gratuits</small>
	</td>
	<td>
		<form role="form" method="post" action="">
			<button type="submit" name="reserver" value="<?php echo $vehicule['numero_immatriculation']; ?>" class="btn btn-primary">Réserver</button>
		</form>
	</td>
</tr>