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
		<form role="form" method="post" action="reserver">
			<input type="hidden" value="<?php echo $vehicule->getnumero_immatriculation(); ?>" name="numero_immatriculation" />
			
			<div class="btn-group">
				<?php if(empty($statut)) { ?>
					<input type="hidden" value="<?php echo $post['date_debut_loc'] ?>" name="date_debut_loc" />
					<input type="hidden" value="<?php echo $post['date_fin_loc'] ?>" name="date_fin_loc" />
					<button type="submit" name="reserver" value="reserver" class="btn btn-primary">Réserver</button>
				<?php } ?>	
				<?php if(!empty($statut)) { ?>
					<button type="submit" name="entretien" value="entretien" class="btn btn-primary">Entretien</button>
				<?php } ?>
				<?php if(!empty($statut)) { ?>
					<button type="submit" name="réparation" value="reparation" class="btn btn-primary">Réparation</button>
				<?php } ?>
				<?php if(!empty($statut)) { ?>
					<button type="submit" name="supprimer" value="supprimer" class="btn btn-primary">Supprimer</button>
				<?php } ?>
			</div>
		</form>
	</td>
</tr>