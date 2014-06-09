<h1>Liste des conducteurs</h1>

<div>
	<a href="ajouter_conducteur" class="btn btn-primary" role="button">Ajouter un conducteur</a>
</div>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Numéro de permis</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($conducteurs as $conducteur) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							<input type="text" class="form" name="nom" id="nom" value="<?php echo $conducteur['nom']; ?>" >
						</td>
						<td>
							<input type="text" class="form" name="prenom" id="prenom" value="<?php echo $conducteur['prenom']; ?>" >
						</td>
						<td>
							<input type="text" class="form" name="numero_permis" id="numero_permis" value="<?php echo $conducteur['numero_permis']; ?>" >
						</td>
						<td class="col-xs-4 text-right">
							<div class="btn-group">
								<button name="modifier" class="btn btn-primary" type="submit">Modifier</button>
								<button name="supprimer" class="btn btn-primary" type="submit">Supprimer</button>
							</div>
						</td>
					</form>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</section>
