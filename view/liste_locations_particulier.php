<h1>Mes locations</h1>

<div>
	<a href="./" class="btn btn-primary" role="button">Réserver une nouvelle location</a>
</div>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID location</th>
				<th>Voiture</th>
				<th>Départ</th>
				<th>Retour</th>
				<th>État</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($locations as $location) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							<input type="text" class="form" name="id location" id="id location" value="<?php echo $location['id_location']; ?>" >
						</td>
						<td>
							<input type="text" class="form" name="voiture" id="voiture" value="<?php echo $location['voiture']; ?>" >
						</td>
						<td>
							<input type="datetime" class="form" name="date_debut_loc" id="date_debut_loc" value="<?php echo $location['date_debut_loc']; ?>" >
						</td>
						<td>
							<input type="datetime" class="form" name="date_fin_loc" id="date_fin_loc" value="<?php echo $location['date_fin_loc']; ?>" >
						</td>
						<td>
							<input type="text" class="form" name="etat" id="etat" value="<?php echo $location['etat']; ?>" >
						</td>
						<td class="col-xs-2 text-right">
							<div class="btn-group-vertical">
								<button name="modifier" class="btn btn-primary" type="submit">Modifier</button>
								<button name="annuler" class="btn btn-primary" type="submit">Annuler</button>
								<button name="valider" class="btn btn-primary" type="submit">Valider</button>
							</div>
						</td>
					</form>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</section>
	