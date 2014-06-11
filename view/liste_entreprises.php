<h1>Liste des entreprises</h1>

<div>
	<a href="ajout_entreprise" class="btn btn-primary" role="button">Ajout d'une entreprise</a>
</div>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Fonction</th>
				<th>Agence</th>
			</tr>
		</thead>
		<tbody>
				<?php foreach($entreprises as $entreprise) { ?>
					<tr>
						<form class="form" method="post" action="" role="form">
							<td>
								<input type="text" class="form" name="nom_entreprise" id="nom_entreprise" value="<?php echo $entreprise->getnom_entreprise(); ?>" >
							</td>
							<td>
								<input type="text" class="form" name="type" id="type" value="<?php echo $entreprise->gettype(); ?>" >
							</td>
							<td>
								<input type="text" class="form" name="nom_agence" id="nom_agence" value="<?php echo $entreprise->getnom_agence(); ?>" >
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
