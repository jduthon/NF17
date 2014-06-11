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
			</tr>
		</thead>
		<tbody>
				<?php foreach($entreprises as $entreprise) { ?>
					<tr>
						<form class="form" method="post" action="" role="form">
							<td>
								<input type="text" class="form" name="nom" id="nom" value="<?php echo $entreprise['nom']; ?>" >
							</td>
							<td>
								<input type="text" class="form" name="fonction" id="fonction" value="<?php echo $entreprise['fonction']; ?>" >
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
