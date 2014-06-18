<h1>Liste des conducteurs</h1>

<?php if(!isset($conducteurs)){ ?>
	Vous n'avez pas encore entrer de conducteurs.
<?php } else { ?>
<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Numéro de permis</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
				<?php foreach($conducteurs as $conducteur) { ?>
					<tr>
						<form class="form" method="post" action="" role="form">
							<td>
								<input type="text" class="form-control" name="nom" id="nom" value="<?php echo $conducteur->getnom(); ?>" >
							</td>
							<td>
								<input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $conducteur->getprenom(); ?>" >
							</td>
							<td>
								<input type="text" class="form-control" name="numero_permis" id="numero_permis" value="<?php echo $conducteur->getnumero_permis(); ?>" >
							</td>
							<td class="col-xs-4 text-right">
								<div class="btn-group">
									<input type="hidden" name="id_conducteur" value="<?php $conducteur->getid_conducteur(); ?>" />
									<button name="modifier" class="btn btn-primary" type="submit">Modifier</button>
									<button name="supprimer" class="btn btn-primary" type="submit">Supprimer</button>
								</div>
							</td>
						</form>
					</tr>
				<?php }}?>
		</tbody>
	</table>
</section>


